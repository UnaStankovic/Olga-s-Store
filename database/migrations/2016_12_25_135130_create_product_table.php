<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Product', function($table) {
            $table->increments('id');
            $table->text('description');
            $table->double('price_per_piece');
            $table->boolean('in_stock');
            $table->string('name', 45);
            $table->string('path_to_picture', 45);
            $table->integer('Category_id')->unsigned();

            $table->foreign('Category_id')->references('id')->on('Category')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Product');
    }
}
