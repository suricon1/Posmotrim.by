<?php

namespace App\UseCases;

use App\Models\Vinograd\Product;
use App\Models\Vinograd\WishlistItem;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Auth;

class WishlistService
{
    private $users;
    private $products;

    public function __construct(UserRepository $users, ProductRepository $products)
    {
        $this->users = $users;
        $this->products = $products;
    }

    public function getAllWishlistProduct()
    {
        return Product::find(
            Auth::user()->wishlistItems->pluck('product_id')->all()
        );
    }

    public function add($userId, $productId)
    {
        $user = $this->users->get($userId);
        $product = $this->products->get($productId);
        WishlistItem::addToWishList($user, $product);
    }

    public function remove($userId, $productId)
    {
        $user = $this->users->get($userId);
        $product = $this->products->get($productId);
        WishlistItem::removeFromWishList($user, $product);
    }
}