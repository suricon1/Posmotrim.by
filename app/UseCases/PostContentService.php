<?php

namespace App\UseCases;

use Storage;
use Illuminate\Database\Eloquent\Model;

class PostContentService
{
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;

        $this->model->content = $this->imageProcessing($this->model->content);
        $this->deleteUnwantedImages($this->model->content);

        $this->model->content = $this->iframeProcessing($this->model->content);

        $this->model->content = $this->linkProcessing($this->model->content);

        $this->model->content = $this->listProcessing($this->model->content);

        $this->model->save();
    }

    public function imageProcessing($text)
    {
        //	Удаляем параграф вокруг картинки
        $text = preg_replace('/<p>(<img[^>]+src=["\']?([^\s"\']+)["\']?[^>]*>)<\/p>/is', '$1', $text);

        //	У загруженных изображений уменьшаем размер и вес
        $text = preg_replace_callback('/<img[^>]+src=["\']?([^\s"\']+)["\']?[^>]*>/is', array($this, 'Img'), $text);

        return $text;
    }

    private function Img($match)
    {
        //	 Ищем в атрибутах ширину фото
        preg_match("/width: *(\d+)px/", $match[0], $matches);
        $width = ($matches) ? $matches[1] : '';

        //	 Ищем в атрибутах высоту фото
        preg_match("/height: *(\d+)px/", $match[0], $matches);
        $height = ($matches) ? $matches[1] : '';

        //	 Ищем выравнивание
        preg_match('/float: *(\w+);/', $match[0], $matches);
        $align = $matches ? $matches[0] : "";

        //	 Ищем атрибут ALT
        preg_match('/alt=\"(.*)\" /Usi', $match[0], $matches);
        $alt = ($matches && trim($matches[1])) ? $matches[1] : $this->model->title;

        return view('admin.components._content_image_template', [
            'file' => preg_replace ("/[^a-zA-Z\s]/","",substr(md5(rand(1,1000000)),0,10)),
            'src' => $this->imageProcess($width, $height, $match[1]),
            'align' => $align,
            'width' => $width,
            'alt' => $alt
        ])->render();
    }

    public function imageProcess($width, $height, $url)
    {
        $temp = parse_url($url);
        if(empty($temp['host'])) return $url;

        $path = str_after($temp['path'], '/storage/');
        //$contentPath = $this->model->getContentPath();
        $src = $this->model->getContentPath() . str_random(20) . '.jpg';

        if(!Storage::exists($this->model->getContentPath())) {
            Storage::makeDirectory($this->model->getContentPath());
        }

        $image = new ImageService(new Size($width.'x'.$height));
        $image->routeUrlImageSave($url, $src, $this->model->watermark);

        if(Storage::exists($path)){
            Storage::delete($path);
        }
        return '/storage/'.$src;
    }

    public function deleteUnwantedImages($text)
    {
        preg_match_all('/<img[^>]+src=["\']?(?<imagesPath>[^\s"\']+)["\']?[^>]*>/is', $text, $matches);
        $images = Storage::files($this->model->getPath().'content');
        foreach ($images as $image){
            if (in_array('/storage/'.$image, $matches['imagesPath'])) {continue;}
            Storage::delete($image);
        }
    }

    public function iframeProcessing($text)
    {
        //	Удаление параграфов вокруг фреймов и оформление адаптивности
        $template = view('admin.components._content_iframe_template')->render();
        return preg_replace('/<p><iframe[^>]+src=["\']?([^\s"\']+)["\']+?[^>]*><\/iframe><\/p>/isU', $template, $text);
    }

    public function linkProcessing($text)
    {
        //	При отсутствии прав модератора ко всем ссылкам в тексте добавляем <noindex>
        //  Ссылки на свой сайт оставить без изменения, для внешних настроить редирект
        if (!is_admin()) {
            preg_replace("!<a[^>]+href=\"?'?([^ \"'>]+)\"?'?[^>]*>([^<>]*?)</a>!is",
                '<noindex><a href="$1" class="link" target="_blank" rel="nofollow noopener">$2</a></noindex>', $text);
        }
        return $text;
    }

    public function listProcessing($text)
    {
        $text = preg_replace("~<ul>~", '<ul class="list-group text-left">', $text);
        $text = preg_replace("~<li>~", '<li class="list-group-item">', $text);
        return $text;
    }
}