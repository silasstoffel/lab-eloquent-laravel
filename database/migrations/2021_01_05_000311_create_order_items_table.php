<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->decimal('unit_price', 10, 3);
            $table->integer('amount');
            $table->decimal('total', 10, 3);
            $table->integer('product_id');

            $table->foreign('product_id', 'fk_product_orderitem')
                ->references('id')
                ->on('product');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item');
    }
}
