<?php

namespace App\Models\Site;

use App\Models\Traits\ImageServais;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Countri extends Model
{
    use Sluggable;
    use ImageServais;

    const LIONS = 1;
    const NOT_LIONS = 0;

    const ORIGIN_IMAGE_NAME = 'origin.jpg';
    const DEFAULT_IMAGE_NAME = '/img/post_default.png';
    public $imageList = [
        '1920x945',     //Основное фото, отображается на посадочной странице
        '200x100',       //Отображается в админке
    ];

    public $timestamps = false;
    protected $fillable = ['name', 'title', 'slug'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function citys()
    {
        return $this->hasMany(City::class);
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

//    public function removeImage()
//    {
//        Storage::deleteDirectory($this->getPath());
//            //Storage::delete('pics/small/' . $this->image);
//    }
//
//    public function uploadImage($image)
//    {
//        if($image == null) { return; }
//
//        $this->removeImage();
//        $image->storeAs($this->getPath(), self::ORIGIN_IMAGE_NAME);
//    }
//
//    public function getOriginImage()
//    {
//        return Storage::exists($this->getPath())
//            ? $this->getPath() . self::ORIGIN_IMAGE_NAME
//            : '/img/post_default.png';
//    }

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
}