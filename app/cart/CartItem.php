<?php

namespace App\cart;

use App\Models\Vinograd\Product;

class CartItem
{
    private $product;
    private $modification;
    private $quantity;

    public function __construct(Product $product, $modification, $quantity)
    {
//        if (!$product->canBeCheckout($modification->id, $quantity)) {
        //dd($modification);
        if ($modification->quantity < $quantity) {
            throw new \DomainException($product->name.' - '.$modification->name.'. Вы заказываете слишком много! В наличии только '.$modification->quantity.' шт.');
        }
        $this->product = $product;
        $this->modification = $modification;
        $this->quantity = $quantity;
    }

    public function getId()
    {
        return md5(serialize([$this->product->id, $this->modification->id]));
    }

    public function getProductId()
    {
        return $this->product->id;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getModificationId()
    {
        return $this->modification->id;
    }

    public function getModification()
    {
//        if ($this->modification->id) {
//            return $this->product->getModification($this->modification->id);
//        }
//        return null;
        return $this->modification;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getPrice()
    {
        if ($this->modification->id) {
            return $this->product->getModificationPrice($this->modification->id);
        }
        return $this->product->price_new;
    }

    public function getWeight()
    {
        return $this->product->weight * $this->quantity;
    }

    public function getCost()
    {
        return $this->getPrice() * $this->quantity;
    }

    public function plus($quantity)
    {
        return new static($this->product, $this->modification, $this->quantity + $quantity);
    }

    public function changeQuantity($quantity)
    {
        return new static($this->product, $this->modification, $quantity);
    }
}