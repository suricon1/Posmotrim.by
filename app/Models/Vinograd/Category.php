<?php

namespace App\Models\Vinograd;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    use Sluggable;

    protected $table = 'vinograd_categorys';
    public $timestamps = false;
    protected $fillable = ['name','title', 'slug', 'text', 'meta_key', 'meta_desc'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function add($fields)
    {
        $category = new static;
        $category->name = $fields['name'];
        $category->title = $fields['title'];
        $category->text = $fields['text'] ?: $fields['title'];
        $category->meta_key = $fields['meta_key'] ?: $fields['title'];
        $category->meta_desc = $fields['meta_desc'] ?: $fields['title'];
        $category->date_add = time();
        $category->date_edit = time();

        $category->save();

        return $category;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

}
