<?php

use App\Model\Order;
use App\Model\OrderItem;
use App\Model\OrderStatus;
use App\Model\Product;
use Illuminate\Database\Seeder;

class CreateOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan make:seeder CreateOrderSeeder

        $iPhone  = Product::where('name', 'Iphone X')->first();
        $iPad    = Product::where('name', 'iPad Air III')->first();
        $macBook = Product::where('name', 'MacBook Pro')->first();
        $AirPods = Product::where('name', 'Apple AirPods II')->first();

        $orderStatus = OrderStatus::where('name', 'Aguardando Pagamento')->first();

        $order = $this->createOrder($orderStatus->id);
        $this->createOrdemItem($order->id, $macBook->price, 1, $macBook->id);
        $this->createOrdemItem($order->id, $iPad->price, 2, $iPad->id);
        $this->refreshOrdem($order->id);

        // second order
        $orderStatus = OrderStatus::where('name', 'Entregue')->first();
        $order       = $this->createOrder($orderStatus->id);
        $this->createOrdemItem($order->id, $iPhone->price, 2, $iPhone->id);
        $this->createOrdemItem($order->id, $AirPods->price, 2, $AirPods->id);
        $this->refreshOrdem($order->id);
        // update dates of second order
        $order->dispatched_on = '2020-12-25 19:30:00';
        $order->deliver_in    = '2021-12-08 10:25:48';
        $order->save();
    }

    private function createOrder($orderStatusId, $total = 0)
    {
        $order = Order::create([
            'order_status_id' => $orderStatusId,
            'total'           => $total,
        ]);
        return $order;
    }

    private function createOrdemItem($orderId, $unitPrice, $amount, $productId)
    {
        $item = OrderItem::create([
            'order_id'   => $orderId,
            'unit_price' => $unitPrice,
            'amount'     => $amount,
            'total'      => $amount * $unitPrice,
            'product_id' => $productId,
        ]);
        return $item;
    }

    public function refreshOrdem($orderId)
    {
        $order = Order::find($orderId);
        $total = 0;
        $order->orderItems->each(function (OrderItem $item) use (&$total) {
            $total += $item->total;
        });
        $order->total = $total;
        $order->save();
    }

}
