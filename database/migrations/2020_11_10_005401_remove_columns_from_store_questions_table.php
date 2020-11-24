<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromStoreQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('store_questions', function (Blueprint $table) {
            //
            $table->dropColumn('question');
            $table->dropColumn('answer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('store_questions', function (Blueprint $table) {
            //
            $table->string('question');
            $table->longText('answer');
        });
    }
}
