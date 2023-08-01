<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `update_centro_nombre`(
    IN CENTRO_ID INT,
    IN NEW_NOMBRE VARCHAR(45)
)
BEGIN

    DECLARE already_exist INT;
    SELECT is_centro_already_created(NEW_NOMBRE) INTO already_exist;

    IF already_exist > 0 THEN
        SELECT 'Failed';
    ELSE
        UPDATE centro SET nombre = NEW_NOMBRE
        WHERE idcentro = CENTRO_ID;

        IF ROW_COUNT() > 0 THEN
            SELECT 'Success' AS RESULT;
        ELSE
            SELECT 'Failed' AS RESULT;
        END IF;
    END IF;
END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS update_centro_nombre");
    }
};
