<?php

namespace App\Models\Site;

use App\Models\Traits\ImageServais;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
	use Sluggable, ImageServais;

	const IS_DRAFT = 0;
	const IS_PUBLIC = 1;

    const DIR_CONTENT_IMAGE_NAME = 'content';
	const ORIGIN_IMAGE_NAME =  'origin.jpg';
    const DEFAULT_IMAGE_NAME = '/img/post_default.png';
    //const IMAGE_WATERMARK =    'img/logo/watermark.png';

    public $watermark = 'img/logo/watermark.png';

    public $imageList = [
        '220x165',  //
        '660x495'   // для страниц секций
    ];

    public $timestamps = false;
	protected $fillable = ['title','content', 'description', 'slug', 'meta_title', 'meta_desc', 'meta_key'];

//==================================
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

//	public function getRouteKeyName()
//    {
//        return 'slug';
//    }

//======== Mutators ================
//    public function setContentAttribute($value)
//    {
//        $this->attributes['content'] = $this->clearingContent($value);
//    }

    public function getContentAttribute($value)
    {
        $value = preg_replace("~<ul>~", '<ul class="list-group text-left">', $value);
        $value = preg_replace("~<ol>~", '<ol class="list-group text-left">', $value);
        $value = preg_replace("~<li>~", '<li class="list-group-item">', $value);
        return ucfirst($value);
    }

//======== Relationships ================

//    public function countri()
//    {
//    	return $this->belongsTo(Countri::class);
//    }
//
//    public function city()
//    {
//        return $this->belongsTo(City::class);
//    }

    public function parent()
    {
        return $this->belongsTo(static::class, 'grupp', 'id');
    }

    public function children()
    {
        return $this->hasMany(static::class, 'grupp', 'id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function author()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(
    		Tag::class,
    		'post_tags',
    		'post_id',
    		'tag_id'
    	);
    }

//======== Scopes ===================
    public function scopeActive($query, $isAdmin = false)
    {
        return $isAdmin ? $query : $query->where('status', 0);
        //return $query->where('status', 0);
    }

    public function scopeNotGrupp($query)
    {
        return $query->where('grupp', 0);
    }

    public function scopeGetGrupp($query, $id)
    {
        return $query->where(function ($q) use ($id) {
                                $q->orWhere('id', $id)->orWhere('grupp', $id);
                            })->orderBy('date_add', 'asc');
    }

    public function scopeSort($query, $sort = false)
    {
        return $sort
            ? $query->orderBy($sort['field'], $sort['order_by'])
            : $query->orderBy('id', 'desc');
    }

//=======================================
    public static function add($fields)
    {
    	$post = new static;
    	$post->fill($fields);
    	$post->author()->associate(Auth::user());
        $post->date_add = time();
        $post->date_edit = time();
        //$post->meta = new Meta($fields, $fields['title']);
        $post->meta_title = $fields['meta_title'] ?: $fields['title'];
        $post->meta_desc = $fields['meta_desc'] ?: $fields['title'];
        $post->meta_key = $fields['meta_key'] ?: $fields['title'];
        $post->save();

    	return $post;
    }

    public function edit($fields)
    {
    	$this->fill($fields);
        $this->date_edit = time();
        $this->meta_title = $fields['meta_title'] ?: $fields['title'];
        $this->meta_desc = $fields['meta_desc'] ?: $fields['title'];
        $this->meta_key = $fields['meta_key'] ?: $fields['title'];
    	$this->save();
    }

    public function remove()
    {
    	$this->deleteImages();
    	$this->delete();
    }

//    public function setCountri($id)
//    {
//    	$this->countri_id = $id;
//    	$this->save();
//    }
//
//    public function setCity($id)
//    {
//        $this->city_id = $id ?: 0;
//        $this->save();
//    }

    public function setTags($ids)
    {
    	$this->tags()->sync($ids);
    }

    public function setDraft()
    {
    	$this->status = Post::IS_DRAFT;
    	$this->save();
    }

    public function setPublic()
    {
    	$this->status = Post::IS_PUBLIC;
    	$this->save();
    }

    public function toggleStatus($value)
    {
        return ($value == null) ? $this->setDraft() : $this->setPublic();
    }

    public function toggledsStatus()
    {
        return ($this->status == 0) ? $this->setPublic() : $this->setDraft();
    }

    public function setFeatured()
    {
    	$this->is_featured = 1;
    	$this->save();
    }

    public function setStandart()
    {
    	$this->is_featured = 0;
    	$this->save();
    }

    public function toggleFeatured($value)
    {
        return($value == null) ? $this->setStandart() : $this->setFeatured();
    }

    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
        return $date;
    }

    public function getCountriTitle()
    {
        return ($this->countri != null)
                ?   $this->countri->name
                :   'Страна не присвоена';
    }

    public function getCityTitle()
    {
        return ($this->city != null)
            ?   $this->city->name
            :   'Город не присвоен';
    }

    public function getTagsTitles()
    {
        return (!$this->tags->isEmpty())
            ?   implode(', ', $this->tags->pluck('title')->all())
            : 'Нет тегов';
    }

    public function getGrupp($id)
    {
        $posts = Post::with('countri', 'city', 'tags')->where('grupp', $id)->orderBy('id')->get();
        return $posts->count() > 0 ? $posts : false;
    }

    public function getCountriID()
    {
        return $this->countri != null ? $this->countri->id : null;
    }

    public function getCityID()
    {
        return $this->city != null ? $this->city->id : null;
    }

    public function getDate()
    {
        return Carbon::createFromFormat('d/m/y', $this->date)->format('F d, Y');
    }

    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $postID = $this->hasPrevious();
        return self::find($postID);
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $postID = $this->hasNext();
        return self::find($postID);
    }

    public function related()
    {
        return self::all()->except($this->id);
    }

    public function hasCategory()
    {
        return $this->category != null ? true : false;
    }

    public static function getPopularPosts()
    {
        return self::orderBy('views','desc')->take(3)->get();
    }

    public static function getNewPostsCount()
    {
        return self::where('status', 1)->get()->count();
    }

    public function StrLimit($str, $limit)
    {
        return str_limit(wp_strip_all_tags(htmlspecialchars_decode($str)), $limit);
    }

    public static function getAllTagPosts($field, $value)
    {
        $posts = Post::with('tags')->
                    active()->
                    notGrupp()->
                    where($field, $value)->
                    orderBy('id', 'desc')->
                    get();
        $tags = [];
        foreach ($posts as $post)
        {
            foreach ($post->tags as $tag)
            {
                data_set($tags, $tag->slug, $tag->title);
            }
        }
        return $tags;
    }
}