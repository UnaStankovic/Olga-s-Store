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
        ['path' => '/assets/img/OldMoney/1', 'Product_id' => 1],
        ['path' => '/assets/img/OldMoney/2', 'Product_id' => 2],
        ['path' => '/assets/img/Postcards/3', 'Product_id' => 3],
        ['path' => '/assets/img/Postcards/4', 'Product_id' => 4],
        ['path' => '/assets/img/Postcards/5', 'Product_id' => 5],
        ['path' => '/assets/img/Postcards/6', 'Product_id' => 6],
        ['path' => '/assets/img/Postcards/7', 'Product_id' => 7],
        ['path' => '/assets/img/Postcards/8', 'Product_id' => 8],
        ['path' => '/assets/img/Postcards/9', 'Product_id' => 9],
        ['path' => '/assets/img/Postcards/10', 'Product_id' => 10],
        ['path' => '/assets/img/Postcards/11', 'Product_id' => 11],
        ['path' => '/assets/img/OldMoney/12', 'Product_id' => 12],
        ['path' => '/assets/img/OldMoney/13', 'Product_id' => 13],
        ['path' => '/assets/img/Stamps/14', 'Product_id' => 14],
        ['path' => '/assets/img/Stamps/15', 'Product_id' => 15],
        ['path' => '/assets/img/Stamps/16', 'Product_id' => 16],
        ['path' => '/assets/img/Stamps/17', 'Product_id' => 17],
        ['path' => '/assets/img/Stamps/18', 'Product_id' => 18],
        ['path' => '/assets/img/Stamps/19', 'Product_id' => 19],
        ['path' => '/assets/img/OldMoney/20', 'Product_id' => 20],
        ['path' => '/assets/img/OldMoney/21', 'Product_id' => 21],
        ['path' => '/assets/img/OldMoney/22', 'Product_id' => 22],
        ['path' => '/assets/img/OldMoney/23', 'Product_id' => 23],
        ['path' => '/assets/img/OldMoney/24', 'Product_id' => 24],
        ['path' => '/assets/img/OldMoney/25', 'Product_id' => 25],
        ['path' => '/assets/img/OldMoney/26', 'Product_id' => 26],
        ['path' => '/assets/img/OldMoney/27', 'Product_id' => 27],
        ['path' => '/assets/img/OldMoney/28', 'Product_id' => 28],
        ['path' => '/assets/img/OldMoney/29', 'Product_id' => 29],
        ['path' => '/assets/img/OldMoney/30', 'Product_id' => 30],
        ['path' => '/assets/img/OldMoney/31', 'Product_id' => 31],
        ['path' => '/assets/img/OldMoney/32', 'Product_id' => 32],
        ['path' => '/assets/img/OldMoney/33', 'Product_id' => 33],
        ['path' => '/assets/img/OldMoney/34', 'Product_id' => 34],
        ['path' => '/assets/img/OldMoney/35', 'Product_id' => 35],
        ['path' => '/assets/img/OldMoney/36', 'Product_id' => 36],
        ['path' => '/assets/img/OldMoney/37', 'Product_id' => 37],
        ['path' => '/assets/img/OldMoney/38', 'Product_id' => 38]
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
        //
    }
}
