<?php

namespace App\UseCases;

class  Size
{
    public $width;
    public $height;

    public function __construct($size)
    {
        list($this->width, $this->height) = explode('x', $size);
        $this->sizeValid();
    }

    public function sizeValid()
    {
        if  (!preg_match('/^[0-9]*$/s', $this->width) || !preg_match('/^[0-9]*$/', $this->height)) {
            throw new \DomainException('Ошибка, введенные данные не корректны.');
        }
    }
}