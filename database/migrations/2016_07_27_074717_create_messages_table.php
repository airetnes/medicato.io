<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('to')->unsigned();
            $table->integer('from')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->text('body');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('to')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('from')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('parent_id')
                ->references('id')->on('users')
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
        Schema::drop('messages');
    }
}
