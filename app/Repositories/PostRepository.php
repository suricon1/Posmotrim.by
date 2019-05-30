<?php
namespace App\Repositories;

use App\Models\Site\Post;
use App\Models\Site\Region;
use App\Models\Site\Tag;
use App\Models\Site\TagDesc;
use Route;

class PostRepository {

    public $article = '';
    public $tag = '';
    public $_region;
    public $regionRep;

    public function __construct (RegionRepository $repository)
    {
        $this->regionRep = $repository;
        $rout = Route::current()->parameters();
        //dd(Route::current()->parameterNames());
        //dd(Route::current()->parameters());

        if (!empty($rout['region'])){
            $this->_region = $this->regionRep->getRegion($rout['region']);
        }
        if (!empty($rout['tag'])){
            $this->tag = Tag::where('slug', $rout['tag'])->firstOrFail();
        }
        if (!empty($rout['alias'])){
            $this->article = $this->getPost($rout['alias']);

            $this->_region = $this->article->region;
        }
    }

    public function getSectionInfo()
    {
        return $this->_region;
    }

    public function getSectionInfoTag()
    {
        $section_info = TagDesc::where('region_id', $this->_region->id)->where('tag_id', $this->tag->id)->first();
        if (!$section_info){
            $section_info = TagDesc::where('region_id', $this->_region->parent->id)->where('tag_id', $this->tag->id)->firstOrFail();
        }
        if(!$section_info){abort(404);}
        return $section_info;
    }

    public function getPostsTag($sort, $page)
    {
        $region_id = $this->regionRep->getAllRegionId($this->_region);
        return $this->tag->posts()->
            with('comments')->
            active()->
            notGrupp()->
            whereIn('region_id', $region_id)->
            sort($sort)->
            paginate(10, ['*'], 'page', $page);
    }

    public function getAllTagPosts($field, $value)
    {
        return Post::getAllTagPosts($field, $value);
    }

    public function getPosts($sort, $page)
    {
        $region_id = $this->regionRep->getAllRegionId($this->_region);
        return Post::with('comments')->
            active()->
            notGrupp()->
            sort($sort)->
            whereIn('region_id', $region_id)->
            paginate(10, ['*'], 'page', $page);
    }

    public function getPost($slug)
    {
        return Post::with('region.parent.children', 'tags', 'comments')
            ->where('slug', $slug)
            ->active(is_admin())
            ->firstOrFail();
    }

    public function getPostsGrupp()
    {
        return Post::with('author')
            ->active(is_admin())
            ->getGrupp($this->article->id)
            ->get();
    }

    public static function getSubPostsGrupp($id)
    {
        return Post::active()
            ->where('grupp', $id)
            ->orderBy('date_add')
            ->get();
    }

    public function getRelatedPosts ()
    {
        $posts = collect();
        foreach ($this->article->tags->pluck('id')->all() as $id){
            $posts = $posts->merge(Tag::find($id)
                ->posts()
                ->active()
                ->notGrupp()
                ->where('region_id', $this->article->region_id)
                ->where('slug' ,'<>', $this->article->slug)
                ->orderBy('prosmotr', 'DESC')
                ->take(12)
                ->get()
            );
        }
        if(!$posts || $posts->count() < 8){
            return $posts->merge($this->getRandomPosts())->unique('id')->take(12);
        }
        return $posts->sortByDesc('prosmotr')->unique('id')->take(12);
    }

    public function getRandomPosts()
    {
        return Post::inRandomOrder()
            ->active()
            ->notGrupp()
            ->where('region_id', $this->article->countri_id)
            ->where('slug' ,'<>', $this->article->slug)
            ->orderBy('prosmotr', 'DESC')
            ->take(12)
            ->get();
    }

    public function getPopularPostsByCountri ($region, $take = 9)
    {
        //$region = Region::find();

        $ids = $this->regionRep->getAllRegionId($region);
        return Post::notGrupp()
            ->active()
            ->whereIn('region_id', $ids)
            ->orderBy('prosmotr', 'desc')
            ->take($take)
            ->get();
    }

    public function getNewOrPopularPosts ($fildOrderBy, $take = 6)
    {
        return Post::notGrupp()
            ->active()
            ->orderBy($fildOrderBy, 'desc')
            ->take($take)
            ->get();
    }

    public function getAllPostsOnCountri($countri_id, $page) {
        return Post::where('region_id', $countri_id)
            ->active()
            ->notGrupp()
            ->orderBy('title')
            ->paginate(50, ['*'], 'page', $page);
    }

    public function getCountPostsByCity($region)
    {
        $region_id = $this->regionRep->getAllRegionId($region);
        return Post::
            join('regions', function ($join) use($region) {
                $join->on('posts.region_id', '=', 'regions.id')
                    ->where('posts.region_id', '<>', $region->id);
            })->
            selectRaw('count(*) as posts_count, regions.name as city_name, regions.slug as city_slug')->
            active()->
            notGrupp()->
            whereIn('posts.region_id', $region_id)->
            orderBy('posts_count', 'desc')->
            groupBy('city_id', 'city_name', 'city_slug')->
            take(6)->
            get();
    }
}