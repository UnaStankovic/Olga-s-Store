<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertIntoPrivilegeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('Privilege')->insert([
            ['id' => 'C', 'description' => 'Customer'],
            ['id' => 'A', 'description' => 'Administrator']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('Privilege')->truncate();
        Schema::enableForeignKeyConstraints();
    }
}
