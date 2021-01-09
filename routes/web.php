<?php

use App\Model\Order;
use App\Model\OrderStatus;
use App\Model\Product;


Route::get('/', function () {
    $products = Product::all()->sortBy('name');
    $orderStatus = OrderStatus::all()->sortBy('name');
    $orders = Order::all();

    return view('welcome', [
        'products' => $products,
        'status' => $orderStatus,
        'orders' => $orders
    ]);
});
