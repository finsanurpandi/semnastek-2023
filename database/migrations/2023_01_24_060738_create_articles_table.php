<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('users_id')->constrained();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('scope_id')->unsigned();
            $table->string('title');
            $table->text('abstract');
            $table->string('keywords');
            $table->string('corresponding_email');
            // $table->string('file');
            $table->boolean('active')->default(true);
            $table->dateTime('submitted_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('scope_id')
                    ->references('id')
                    ->on('scopes')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
