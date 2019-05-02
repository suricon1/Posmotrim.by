<?php

namespace App\Models\Site;

use App\Models\Traits\ImageServais;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class City extends Model
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
    protected $table = 'citys';
    protected $fillable = ['name', 'title', 'slug'/*, 'text', 'meta_key', 'meta_desc'*/];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function countri()
    {
        return $this->belongsTo(Countri::class);
    }

    public static function add($fields)
    {
        $city = new static;
        $city->name = $fields['name'];
        $city->title = $fields['title'];
        $city->text = $fields['text'] ?: $fields['title'];
        $city->meta_key = $fields['meta_key'] ?: $fields['title'];
        $city->meta_desc = $fields['meta_desc'] ?: $fields['title'];

        $city->save();
        return $city;
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

    public function setCountri($id)
    {
        if($id == null) {return;}
        $this->countri_id = $id;
        $this->save();
    }

    public function getCountriID()
    {
        return $this->countri != null ? $this->countri->id : null;
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
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
}
