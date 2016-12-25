<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Order', function($table) {
            $table->increments('id');
            $table->date('date_of_creation');
            $table->string('status', 45);
            $table->double('amount');
            $table->integer('User_id')->unsigned();
            $table->string('comment', 45)->nullable();

            $table->foreign('User_id')->references('id')->on('User')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Order');
    }
}
