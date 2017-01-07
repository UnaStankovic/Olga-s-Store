<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('Category')->insert([
        ['name' => 'Stari novac'],
        ['name' => 'Markice'],
        ['name' => 'Razglednice i ostali slični proizvodi'],
        ['name' => 'Keramika'],
        ['name' => 'Ostali proizvodi']
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
        DB::table('Category')->truncate();
        Schema::enableForeignKeyConstraints();
    }
}
