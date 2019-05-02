<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
	use Sluggable;

    public $timestamps = false;
	protected $fillable = ['title', 'slug'];
	
    public function posts()
    {
    	return $this->belongsToMany(
    		Post::class,
    		'post_tags',
    		'tag_id',
    		'post_id'
    	);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ]; 
    }
}
