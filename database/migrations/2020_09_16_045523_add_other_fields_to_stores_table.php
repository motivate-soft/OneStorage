<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherFieldsToStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            //
            $table->string('suburb')->nullable();
            $table->string('detail')->nullable();
            $table->string('text_above_addr')->nullable();
            $table->string('text_below_addr')->nullable();
            $table->longText('latest_offer')->nullable();
            $table->string('service_facilities')->nullable();
            $table->longText('nearby_facilities')->nullable();
            $table->string('opening_hours')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            //
        });
    }
}
