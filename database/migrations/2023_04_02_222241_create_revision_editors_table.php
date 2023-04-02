<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionEditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revision_editors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('article_id')->unsigned();
            $table->string('revision_file');
            $table->text('comment');
            $table->timestamps();
            $table->string('new_file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revision_editors');
    }
}
