<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_tags', function (Blueprint $table) {
            $table->id();
            $table->string('seo_id')->nullable();
            $table->string('seo_title')->nullable();
            $table->string("seo_description")->nullable();
            $table->string("seo_content")->nullable();
            $table->string('publish_date')->nullable();
            $table->string('status')->default(true);
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
        Schema::dropIfExists('seo_tags');
    }
}
