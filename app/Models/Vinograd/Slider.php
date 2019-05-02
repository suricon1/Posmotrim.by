<?php

namespace App\Models\Vinograd;

use App\Models\Traits\ImageServais;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use ImageServais;

    const ORIGIN_IMAGE_NAME = 'origin.jpg';
    const DEFAULT_IMAGE_NAME = '/img/product_default.jpg';
    public $imageList = [
        '1600x700',       //Основное фото
        '400x200',        //Вспомогательное фото
        '100x50'          //Отображается в админке
    ];

    protected $table = 'vinograd_sliders';
    public $timestamps = false;
    protected $fillable = [
        'title', 'text',
    ];

    public static function add($fields)
    {
        $slider = new static;
        $slider->fill($fields);
        $slider->save();

        return $slider;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->deleteImages();
        $this->delete();
    }
}
