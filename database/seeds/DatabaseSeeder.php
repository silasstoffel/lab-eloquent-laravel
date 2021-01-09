<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CreateProductSeeder::class,
            CreateOrderStatusSeeder::class,
            CreateOrderSeeder::class,
            // ClearDataSeeder::class | run only this: php artisan db:seed --class=ClearDataSeeder
        ]);
    }
}
