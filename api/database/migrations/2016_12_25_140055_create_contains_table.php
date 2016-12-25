<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Contains', function($table) {
            $table->integer('quantity')->unsigned();
            $table->integer('Order_id')->unsigned();
            $table->integer('Product_id')->unsigned();

            $table->primary(['Order_id', 'Product_id']);
            $table->foreign('Order_id')->references('id')->on('Order')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Product_id')->references('id')->on('Product')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Contains');
    }
}
