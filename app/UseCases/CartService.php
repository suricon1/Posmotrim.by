<?php

namespace App\UseCases;


use App\cart\Cart;
use App\cart\CartItem;
use App\Repositories\ProductRepository;

class CartService
{
    private $cart;
    private $products;

    public function __construct(Cart $cart, ProductRepository $products)
    {
        $this->cart = $cart;
        $this->products = $products;
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function add($product, $modification, $quantity)
    {
        $this->cart->add(new CartItem($product, $modification, $quantity));
    }

    public function set($id, $quantity)
    {
        $this->cart->set($id, $quantity);
    }

    public function remove($id)
    {
        $this->cart->remove($id);
    }

    public function clear()
    {
        $this->cart->clear();
    }

}