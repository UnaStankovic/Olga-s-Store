<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerImagePath extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER `image_path_trigger`
            BEFORE INSERT ON `ProductImage`
            FOR EACH ROW
            BEGIN
                SET NEW.path = CONCAT('/img/', NEW.id);
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
        DB::unprepared("DROP TRIGGER `image_path_trigger`");
    }
}
