<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Requests\Admin\Post\PostIndexSortRequest;
use App\Http\Requests\Admin\Post\PostRequest;
use App\Jobs\ContentProcessing;
use App\Jobs\ImageProcessing;
use App\UseCases\PostContentService;
use Artisan;
use Illuminate\Database\Eloquent\Model;
use App\Models\Site\City;
use App\Models\Site\Post;
use App\Models\Site\Tag;
use App\Models\Site\Countri;
use App\Models\Site\TagDesc;
use Illuminate\Http\Request;
use View;

class PostsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        View::share ('post_active', ' active');
    }

//=========== Index =============================
    public function index(PostIndexSortRequest $request)
    {
       $citys = ($request->get('countri_id'))
            ? getArray(City::orderBy('name')->where('countri_id', $request->get('countri_id'))->pluck('name', 'id')->all())
            : getArray(City::orderBy('name')->pluck('name', 'id')->all());

        return view('admin.posts.index', [
            'countrys' => getArray(Countri::orderBy('name')->pluck('name', 'id')->all()),
            'tags'     => getArray(Tag::orderBy('title')->pluck('title', 'id')->all()),
            'posts'    => $this->search($request),
            'citys'    => $citys
        ]);
    }

//=========== Create =============================
    public function create()
    {
        return view('admin.posts.create', [
            'countris' => getArray(Countri::orderBy('name')->pluck('name', 'id')->all()),
            'tags'     => getArray(Tag::orderBy('title')->pluck('title', 'id')->all())
        ]);
    }

//=========== Store =============================
    public function store(PostRequest $request)
    {
        $post = Post::add($request->all());
        $post->setCountri($request->get('countri_id'));
        $post->setCity($request->get('city_id'));
        $post->setTags($request->get('tags'));
        $post->toggleStatus($request->get('status'));
        $post->toggleFeatured($request->get('is_featured'));

        $this->addTagsDesc($request->get('tags'), $post);

        $this->imageServis($request, $post);

        return redirect()->route('posts.index');
    }

//=========== Edit =============================
    public function edit(Post $post)
    {
        //$post = Post::find($id);
        return view('admin.posts.edit', [
            'countris'     => getArray(Countri::orderBy('name')->pluck('name', 'id')->all()),
            'citys'        => getArray(City::orderBy('name')->where('countri_id', $post->countri_id)->pluck('name', 'id')->all()),
            'tags'         => getArray(Tag::orderBy('title')->pluck('title', 'id')->all()),
            'post'         => $post,
            'selectedTags' => $post->tags->pluck('id')->all()
        ]);
    }

//=========== Update =============================
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

        $post->edit($request->all());
        $post->setCountri($request->get('countri_id'));
        $post->setCity($request->get('city_id'));
        $post->setTags($request->get('tags'));
        $post->toggleStatus($request->get('status'));
        $post->toggleFeatured($request->get('is_featured'));

        $this->addTagsDesc($request->get('tags'), $post);

        $this->imageServis($request, $post);

        return redirect()->route('posts.index');
    }

//=========== Destroy =============================
    public function destroy($id)
    {
        Post::find($id)->remove();
        return redirect()->route('posts.index');
    }

//=========== Toggle =============================
    public function toggle($id)
    {
        $post = Post::find($id);
        $post->toggledsStatus();

        return redirect()->back();
    }

//=========== AddTagsDesc =============================
    public function addTagsDesc($tags, $post)
    {
        if(!$tags){return;}
        foreach ($tags as $tag_id)
        {
            $tag = Tag::find($tag_id);
            $info = $post->city
                ? $post->countri->name .' '. $post->city->name .' '. $tag->title
                : $post->countri->name .' '. $tag->title;

            TagDesc::add($tag_id, $post->city_id ?: 0, $post->countri_id, $info);
        }
    }

//=========== ImageServis =============================
    public function imageServis(Request $request, Model $post)
    {
        try {
            $post->uploadImage($request->file('image'));
            if($request->file('image') != null) {
                //dispatch(new ImageProcessing($post));
                //$product->fitImage();
            }
            //dispatch(new ContentProcessing($post));
            new PostContentService($post);
        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }
        //Artisan::call('queue:work');
    }

//=========== Search =============================
    private function search($request)
    {
        if (!empty($value = $request->get('tag'))) {
            $query = Tag::where('id', $value)->firstOrFail();
            $query = $query->posts()->with('countri', 'city', 'tags')->notGrupp()->orderByDesc('status');
        }else{
            $query = Post::with('countri', 'city', 'tags')->notGrupp()->orderByDesc('status');
        }

        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('title'))) {
            $q = mb_strtolower($value, 'UTF-8');
            $q = trim(preg_replace('/[^a-zа-яё1-9 _-]+/iu', '', $q));

            $arrs = explode(" ", $q);
            $arr = [];
            foreach ($arrs as $word)
            {
                $arr[] = $word . "*";
            }
            $arr = array_unique($arr, SORT_STRING);
            $q = implode(" ", $arr); //объединяет массив в строку

            $query->whereRaw("MATCH(title) AGAINST(? IN BOOLEAN MODE)", $q)
                ->orderByRaw("MATCH(title) AGAINST(? IN BOOLEAN MODE) DESC", $q);
        }

        if (!empty($value = $request->get('countri_id'))) {
            $query->where('countri_id', $value);
        }

        if (!empty($value = $request->get('city_id'))) {
            $query->where('city_id', $value);
        }
        if (!empty($value = $request->get('field'))) {
            $query->orderBy($request->get('field'), $request->get('order_by'));
        }else{
            $query->orderBy('id', 'desc');
        }

        return $query->paginate(20)->appends($request->all());
    }
}