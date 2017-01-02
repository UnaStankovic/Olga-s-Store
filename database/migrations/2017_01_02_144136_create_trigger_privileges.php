<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerPrivileges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER `privileges_trigger`
            AFTER INSERT ON `User`
            FOR EACH ROW
            BEGIN
                INSERT INTO `Has`(`User_id`, `Privilege_id`) VALUES (NEW.id, 'C');
            END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP TRIGGER `privileges_trigger`");
    }
}
