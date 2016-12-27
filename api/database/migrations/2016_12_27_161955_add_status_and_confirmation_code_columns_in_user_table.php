<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusAndConfirmationCodeColumnsInUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('User', function($table) {
            $table->string('confirmation_code', 40);
            $table->string('status', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('User', function($table) {
            $table->dropColumn('confirmation_code');
            $table->dropColumn('status');
        });
    }
}
