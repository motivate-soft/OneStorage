<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->enum('gender', ['m', 'w'])->default('m'); // m is man , w is woman
            $table->date('birthday');
            $table->string('area')->nullable();
            $table->string('place')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('contact_method')->nullable();
            $table->boolean('is_existing_customer')->default(false);
            $table->boolean('is_soundwill_member')->default(false);
            $table->integer('branch_id')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('profiles');
    }
}
