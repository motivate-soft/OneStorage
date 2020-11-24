<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_translations', function (Blueprint $table) {
            // mandatory fields
            $table->id();
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedBigInteger('store_id');
            $table->unique(['store_id', 'locale']);
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');

            // Actual fields you want to translate

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_translations');
    }
}
