<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_sizes', function (Blueprint $table) {
            $table->id();
            $table->integer('size');
            $table->float('width');
            $table->float('height');
            $table->float('depth');
            $table->float('price');
            $table->float('prepaid_price');
            $table->integer("store_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_sizes');
    }
}
