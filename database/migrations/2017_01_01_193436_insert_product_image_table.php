<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertProductImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('ProductImage')->insert([
        ['path' => '/img/OldMoney/1.jpeg', 'Product_id' => 1],
        ['path' => '/img/OldMoney/2.jpeg', 'Product_id' => 2],
        ['path' => '/img/Postcards/3.jpeg', 'Product_id' => 3],
        ['path' => '/img/Postcards/4.jpeg', 'Product_id' => 4],
        ['path' => '/img/Postcards/5.jpeg', 'Product_id' => 5],
        ['path' => '/img/Postcards/6.jpeg', 'Product_id' => 6],
        ['path' => '/img/Postcards/7.jpeg', 'Product_id' => 7],
        ['path' => '/img/Postcards/8.jpeg', 'Product_id' => 8],
        ['path' => '/img/Postcards/9.jpeg', 'Product_id' => 9],
        ['path' => '/img/Postcards/10.jpeg', 'Product_id' => 10],
        ['path' => '/img/Postcards/11.jpeg', 'Product_id' => 11],
        ['path' => '/img/OldMoney/12.jpeg', 'Product_id' => 12],
        ['path' => '/img/OldMoney/13.jpeg', 'Product_id' => 13],
        ['path' => '/img/Stamps/14.jpeg', 'Product_id' => 14],
        ['path' => '/img/Stamps/15.jpeg', 'Product_id' => 15],
        ['path' => '/img/Stamps/16.jpeg', 'Product_id' => 16],
        ['path' => '/img/Stamps/17.jpeg', 'Product_id' => 17],
        ['path' => '/img/Stamps/18.jpeg', 'Product_id' => 18],
        ['path' => '/img/Stamps/19.jpeg', 'Product_id' => 19],
        ['path' => '/img/OldMoney/20a.jpeg', 'Product_id' => 20],
        ['path' => '/img/OldMoney/20b.jpeg', 'Product_id' => 20],
        ['path' => '/img/OldMoney/21a.jpeg', 'Product_id' => 21],
        ['path' => '/img/OldMoney/21b.jpeg', 'Product_id' => 21],
        ['path' => '/img/OldMoney/22a.jpeg', 'Product_id' => 22],
        ['path' => '/img/OldMoney/22b.jpeg', 'Product_id' => 22],
        ['path' => '/img/OldMoney/23a.jpeg', 'Product_id' => 23],
        ['path' => '/img/OldMoney/23b.jpeg', 'Product_id' => 23],
        ['path' => '/img/OldMoney/24a.jpeg', 'Product_id' => 24],
        ['path' => '/img/OldMoney/24b.jpeg', 'Product_id' => 24],
        ['path' => '/img/OldMoney/25a.jpeg', 'Product_id' => 25],
        ['path' => '/img/OldMoney/25b.jpeg', 'Product_id' => 25],
        ['path' => '/img/OldMoney/26a.jpeg', 'Product_id' => 26],
        ['path' => '/img/OldMoney/26b.jpeg', 'Product_id' => 26],
        ['path' => '/img/OldMoney/27a.jpeg', 'Product_id' => 27],
        ['path' => '/img/OldMoney/27b.jpeg', 'Product_id' => 27],
        ['path' => '/img/OldMoney/28a.jpeg', 'Product_id' => 28],
        ['path' => '/img/OldMoney/28b.jpeg', 'Product_id' => 28],
        ['path' => '/img/OldMoney/29a.jpeg', 'Product_id' => 29],
        ['path' => '/img/OldMoney/29b.jpeg', 'Product_id' => 29]
        ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void     
     */
    public function down()
    {
        DB::table('ProductImage')->truncate();
    }
}
