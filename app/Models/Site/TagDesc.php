<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class TagDesc extends Model
{
    public $timestamps = false;
    protected $fillable = ['tag_id','city_id', 'countri_id', 'title', 'text', 'meta_desc', 'meta_key'];

    public function countri()
    {
        return $this->belongsTo(Countri::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function getCountriTitle()
    {
        return ($this->countri != null)
            ?   $this->countri->name
            :   '<span class="text-danger">Страны Нет</span>';
    }

    public function getCityTitle()
    {
        return ($this->city != null)
            ?   $this->city->name
            :   '<span class="text-danger">Города Нет</span>';
    }

    public function getTagTitle()
    {
        return ($this->tag != null)
            ?   $this->tag->title
            :   '<span class="text-danger">Тэга Нет</span>';
    }

    public static function add($tag_id, $city_id, $countri_id, $info)
    {
        static::firstOrCreate(
            [
                'tag_id' => $tag_id,
                'city_id' => $city_id,
                'countri_id' => $countri_id
            ],
            [
                'title' => $info,
                'text' => $info,
                'meta_desc' => $info,
                'meta_key' => $info,
            ]
        );
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->city_id = $fields['city_id'] == null ? 0 : $fields['city_id'];
        $this->save();
    }
}
