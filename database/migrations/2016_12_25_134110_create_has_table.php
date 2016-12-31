<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Has', function($table) {
            $table->integer('User_id')->unsigned();
            $table->integer('Privilege_id')->unsigned();

            $table->primary(['User_id', 'Privilege_id']);
            $table->foreign('User_id')->references('id')->on('User')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Privilege_id')->references('id')->on('Privilege')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Has');
    }
}
