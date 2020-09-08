<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('branch_name')->nullable();
            $table->integer('branch_size')->nullable();
            $table->string('question')->nullable();
            $table->string('message')->nullable();
            $table->string('page');
            $table->integer('status')->default(0);
            $table->integer('principal_id')->nullable();
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
        Schema::dropIfExists('enquiries');
    }
}
