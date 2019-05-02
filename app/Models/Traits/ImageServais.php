<?php

namespace App\Models\Traits;

use App\UseCases\ImageService;
use App\UseCases\Size;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Image;


trait ImageServais
{
    public function getPath()
    {
        $className = strtolower(class_basename(self::class));
        $dir = implode('/', array_slice(explode('\\', self::class),-2,2));
        return "pics/$dir/$className-{$this->id}/";
    }

    public function getContentPath()
    {
        return $this->getPath() . self::DIR_CONTENT_IMAGE_NAME . '/';
    }

    public function fitImage()
    {
        if (!$this->imageList) {
            return;
        }
        foreach ($this->imageList as $value) {
            $this->saveImage(new Size($value));
        }
    }

    public function getImage($value = false)
    {
        if (!$value) {
            return Storage::url($this->getOriginImage());
        }

        if (!Storage::exists($this->getPath() . self::ORIGIN_IMAGE_NAME)) {
            return self::DEFAULT_IMAGE_NAME;
        }

        if (Storage::exists($this->getPath() . $value . '.jpg')) {
            //return $this->getPath() . $value . '.jpg';
            return Storage::url($this->getPath() . $value . '.jpg');
        }
        return $this->saveImage(new Size($value));
    }

    public function removeImage()
    {
        $files = Storage::files($this->getPath());
        Storage::delete($files);
    }

    public function deleteImages()
    {
        Storage::deleteDirectory($this->getPath());
    }

    public function uploadImage($image)
    {
        if ($image == null) {return;}

        $this->removeImage();

        if(!Storage::exists($this->getPath())){
            Storage::makeDirectory($this->getPath());
        }

        $img = new ImageService(new Size('0x0'));
        $img->routeUrlImageSave($image, $this->getPath().self::ORIGIN_IMAGE_NAME, $this->watermark);
    }

    public function getOriginImage()
    {
        return Storage::exists($this->getPath() . self::ORIGIN_IMAGE_NAME)
            ? $this->getPath() . self::ORIGIN_IMAGE_NAME
            : self::DEFAULT_IMAGE_NAME;
    }

    private function saveImage(Size $size)
    {
        $path = $this->getPath() . $size->width . 'x' . $size->height . '.jpg';
        if (Storage::exists($path)) {
            return Storage::url($path);
        }

        $image = new ImageService($size);
        $image->routeImageSave($this->getOriginImage(), $path);

        return Storage::url($path);
    }
}