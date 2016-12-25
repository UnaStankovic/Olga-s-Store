<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User', function($table) {
			$table->increments('id');
			$table->string('email', 45);
			$table->string('password', 40);
			$table->string('name', 45)->nullable();
			$table->string('surname', 45)->nullable();
			$table->string('address', 45)->nullable();
			$table->string('city', 45)->nullable();
			$table->string('country', 45)->nullable();
			$table->string('telephone', 45)->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('User');
    }
}
