<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;

class Commande extends Model
{
    protected $table = 'commandes';

    protected $fillable = [
        'quantity' , 'description'
    ];

    public function buyer()
    {
        $user = User::find($this->id_buyer);
        return $user;
    }

    public function seller()
    {
        $product = Product::find($this->id_product);
        return $product->user();
    }

    public function product()
    {
        $product = Product::find($this->id_product);
        return $product;
    }
}
