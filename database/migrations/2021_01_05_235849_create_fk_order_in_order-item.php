<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFkOrderInOrderItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('order_item', 'order_id')) {
            Schema::table('order_item', function (Blueprint $table) {
                $table->integer('order_id')->nullable();
                $table->foreign('order_id', 'fk_orderitem_order')
                    ->references('id')
                    ->on('order');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
