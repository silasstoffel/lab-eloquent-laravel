<?php

use App\Model\Order;
use App\Model\OrderItem;
use App\Model\OrderStatus;
use App\Model\Product;
use Illuminate\Database\Seeder;

class ClearDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create: php artisan make:seeder ClearDataSeeder
        // run   : php artisan db:seed --class=ClearDataSeeder
        $this->deleteOrders();
        $this->deleteOrderStatus();
        $this->deleteProducts();
    }

    private function deleteOrders()
    {
        Order::all()->each(function (Order $order) {
            $order->orderItems->each(function (OrderItem $item) {
                $item->delete();
            });
            $order->delete();
        });
    }

    private function deleteOrderStatus()
    {
        OrderStatus::all()->each(function (OrderStatus $status) {
            $status->delete();
        });
    }

    private function deleteProducts()
    {
        Product::all()->each(function (Product $p) {
            $p->delete();
        });
    }

}
