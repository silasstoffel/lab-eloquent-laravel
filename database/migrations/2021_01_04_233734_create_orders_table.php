<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->decimal('amount', 10, 4);
            $table->integer('order_status_id')->nullable();
            $table->dateTime('dispatched_on')->nullable();
            $table->dateTime('deliver_in')->nullable();

            $table->foreign('order_status_id', 'orderstatus_on_order')
                ->references('order_status_id')
                ->on('order_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
