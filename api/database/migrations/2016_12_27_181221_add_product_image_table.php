<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Product', function($table) {
            $table->dropColumn('path_to_picture');
        });
        
        Schema::create('ProductImage', function($table) {
            $table->increments('id');
            $table->string('path', 45);
            $table->integer('Product_id')->unsigned();
            
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
        Schema::table('Product', function($table) {
            $table->string('path_to_picture', 45);
        });
        
        Schema::drop('ProductImage');
    }
}
