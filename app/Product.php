<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;

class Product extends Model
{
    protected $fillable = [
        'name' , 'description' , 'price' , 'quantity' , 'image'
    ];

    protected $table = 'products';


    public function user()
    {
        return User::find($this->id_user);
    }

    public function category()
    {
        return Category::find($this->id_category);
    }
}
