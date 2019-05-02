<?php

namespace App\Models\Site;

use App\Models\Traits\GalleryServais;
use App\Models\Traits\ImageServais;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use ImageServais, GalleryServais;

    const LIONS = 1;
    const NOT_LIONS = 0;

    const DIR_GALERY_NAME = 'galery';
    const DIR_CONTENT_IMAGE_NAME = 'content';
    const ORIGIN_IMAGE_NAME = 'origin.jpg';
    const DEFAULT_IMAGE_NAME = '/img/post_default.png';

    public $watermark = 'img/logo/watermark.png';

    public $imageList = [
        '1920x945',     //Основное фото, отображается на посадочной странице
        '200x100',       //Отображается в админке
    ];

    protected $fillable = ['name', 'slug', 'parent_id'];
    public $timestamps = false;
    protected $table = 'regions';

//    public function getPath(): string
//    {
//        return ($this->parent ? $this->parent->getPath() . '/' : '') . $this->slug;
//    }
//
//    public function getAddress(): string
//    {
//        return ($this->parent ? $this->parent->getAddress() . ', ' : '') . $this->name;
//    }

//======== Relationships ================
    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(static::class, 'parent_id', 'id')->orderBy('name');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function add($fields)
    {
        $country = new static;
        $country->fill($fields);
        $country->meta_title = $fields['meta_title'] ?: $fields['title'];
        $country->text = $fields['text'] ?: $fields['title'];
        $country->meta_key = $fields['meta_key'] ?: $fields['title'];
        $country->meta_desc = $fields['meta_desc'] ?: $fields['title'];
        $country->save();
        return $country;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->meta_title = $fields['meta_title'] ?: $fields['title'];
        $this->text = $fields['text'] ?: $fields['title'];
        $this->meta_key = $fields['meta_key'] ?: $fields['title'];
        $this->meta_desc = $fields['meta_desc'] ?: $fields['title'];
        $this->save();
    }

    public function remove()
    {
        $this->deleteImages();
        $this->delete();
    }

    public function setLions()
    {
        $this->is_lions = self::LIONS;
        $this->save();
    }

    public function setNotLions()
    {
        $this->is_lions = self::NOT_LIONS;
        $this->save();
    }

    public function toggleLions($value)
    {
        return ($value == null) ? $this->setNotLions() : $this->setLions();
    }



//    public function scopeRoots(Builder $query)
//    {
//        return $query->where('parent_id', null);
//    }
}
