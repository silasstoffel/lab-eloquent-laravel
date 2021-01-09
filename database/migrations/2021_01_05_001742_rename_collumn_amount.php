<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCollumnAmount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('order', 'amount')) {
            Schema::table('order', function (Blueprint $table) {
                $table->renameColumn('amount', 'total');
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
        if (Schema::hasColumn('order', 'total')) {
            Schema::table('order', function (Blueprint $table) {
                $table->renameColumn('total', 'amount');
            });
        }
    }
}
