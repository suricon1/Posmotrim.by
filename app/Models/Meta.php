<?php

namespace App\Models;


class Meta
{
    public $title;
    public $description;
    public $keywords;

    public function __construct($meta, $default)
    {
        $this->title = $meta->input('meta.title') ?: $default;
        $this->description = $meta->input('meta.desc') ?: $default;
        $this->keywords = $meta->input('meta.key') ?: $default;
    }
}