<?php

use App\Model\Product;
use Illuminate\Database\Seeder;

class CreateProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'          => 'Iphone X',
            'description'   => 'Description of Iphone X',
            'active'        => true,
            'total_in_stock' => 25,
            'price'         => 7800.000,
        ]);

        Product::create([
            'name'          => 'MacBook Pro',
            'description'   => 'Description of MacBook',
            'active'        => true,
            'total_in_stock' => 30,
            'price'         => 12300.000,
        ]);

        Product::create([
            'name'          => 'iPad Air III',
            'description'   => 'Description of iPad Air',
            'active'        => true,
            'total_in_stock' => 30,
            'price'         => 2900.000,
        ]);

        Product::create([
            'name'          => 'Apple AirPods I',
            'description'   => 'Description of AirPods I',
            'active'        => false,
            'total_in_stock' => 0,
            'price'         => 900.000,
        ]);

        Product::create([
            'name'          => 'Apple AirPods II',
            'description'   => 'Description of AirPods I',
            'active'        => true,
            'total_in_stock' => 15,
            'price'         => 1000.000,
        ]);
    }
}
