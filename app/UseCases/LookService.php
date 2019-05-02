<?php

namespace App\UseCases;

use App\Models\Vinograd\Product;
use Cookie;
use Illuminate\Database\Query\Expression;

class LookService
{
    public static function getLookProducts()
    {
        if(!$arToBasket = json_decode(Cookie::get('look'))) return false;

        return Product::whereIn('id', $arToBasket)
            ->orderBy(new Expression('FIELD(id,' . implode(',', array_reverse($arToBasket)) . ')'))
            ->get();
    }

    public function setCookieLook($id)
    {
        if(!$arToBasket = json_decode(Cookie::get('look'))) $arToBasket = [];

        if(!in_array($id, $arToBasket)){
            $arToBasket[] = $id;
            $arToBasket = array_slice($arToBasket, -8, 8);// Отрезали до 8 свежих просмотров
            Cookie::queue('look', json_encode($arToBasket), 86400);
        }
    }
}