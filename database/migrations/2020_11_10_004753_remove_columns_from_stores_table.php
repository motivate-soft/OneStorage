<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromStoresTable extends Migration
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
            $table->dropColumn('location');
            $table->dropColumn('branch');
            $table->dropColumn('address');
            $table->dropColumn('suburb');
            $table->dropColumn('detail');
            $table->dropColumn('text_above_addr');
            $table->dropColumn('text_below_addr');
            $table->dropColumn('latest_offer');
            $table->dropColumn('nearby_facilities');
            $table->dropColumn('opening_hours');
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
            $table->string('location');
            $table->string('branch');
            $table->string('address');
            $table->string('suburb')->nullable();
            $table->string('detail')->nullable();
            $table->string('text_above_addr')->nullable();
            $table->string('text_below_addr')->nullable();
            $table->longText('latest_offer')->nullable();
            $table->longText('nearby_facilities')->nullable();
            $table->string('opening_hours')->nullable();
        });
    }
}
