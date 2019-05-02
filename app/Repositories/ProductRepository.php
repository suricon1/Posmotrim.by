<?php

namespace App\Repositories;


use App\Models\Vinograd\Modification;
use App\Models\Vinograd\Product;

class ProductRepository
{
    public function get($id): Product
    {
        if (!$product = Product::find($id)) {
            throw new \DomainException('Такой товар не существует.');
        }
        return $product;
    }

    public function getModification($id)
    {
        if (!$modification = Modification::find($id)) {
            throw new \DomainException('Такой модификации не существует.');
        }
        return $modification;
    }
}