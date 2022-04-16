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
        Product::create(array(
            'business_id' => 1,
            'name' => 'bowl',
            'amount' => '10',
            'price' => '5',
            'picture' => 'noimage.png',
            'description' => 'lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum'
        ));
        Product::create(array(
            'business_id' => 1,
            'name' => 'dish',
            'amount' => '10',
            'price' => '6',
            'picture' => 'noimage.png',
            'description' => 'lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum'
        ));
        Product::create(array(
            'business_id' => 1,
            'name' => 'super bowl',
            'amount' => '10',
            'price' => '7',
            'picture' => 'noimage.png',
            'description' => 'lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum lorem imsup lorem ipsum'
        ));
    }
}
