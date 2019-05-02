<?php

namespace App\Models\Vinograd;

use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    protected $table = 'vinograd_user_wishlist_items';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'product_id',
    ];

    public static function create($productId)
    {
        $item = new static();
        $item->product_id = $productId;
        return $item;
    }

    public function isForProduct($productId)
    {
        return $this->product_id == $productId;
    }

    public static function addToWishList($user, $product)
    {
        static::firstOrCreate(['user_id' => $user->id, 'product_id' => $product->id]);
    }

    public static function removeFromWishList($user, $product)
    {
        static::where(['user_id' => $user->id, 'product_id' => $product->id])->delete();
    }
}
