<?php

namespace App\Models\Vinograd;

use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    protected $table = 'vinograd_product_modifications';
    public $timestamps = false;
    protected $fillable = ['name', 'price', 'quantity', 'product_id'];


    public static function create($fields)
    {
        $modification = new static;
        $modification->fill($fields);
        $modification->save();
        return $modification;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function checkout($quantity)
    {
        if ($quantity > $this->quantity) {
            throw new \DomainException('Only ' . $this->quantity . ' items are available.');
        }
        $this->quantity -= $quantity;
    }

    public function isIdEqualTo($id)
    {
        return $this->id == $id;
    }
}
