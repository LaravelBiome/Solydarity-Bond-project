<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $product = new Product;
        $produdt->name('Test 1');
        $produdt->description('Test 1 description');
        $produdt->quantity(10);
        $produdt->price(5);
        $produdt->visible(1);
        $product->id_user(0);
        $product->image('path to image');
        $product->save();
    }
}
