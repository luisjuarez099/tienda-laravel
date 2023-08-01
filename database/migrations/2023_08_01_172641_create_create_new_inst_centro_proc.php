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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `create_new_inst_centro`(
    IN CENTRO VARCHAR(45),
    IN INSTALACION VARCHAR(45)
    )
BEGIN

    DECLARE centro_id INT;
    DECLARE inst_id INT;

    -- find id's
    SELECT find_centro_id(CENTRO) INTO centro_id;
    SELECT find_instalacion_id(INSTALACION) INTO inst_id;

    -- if id's are not null -> execute
    IF centro_id IS NOT NULL AND inst_id IS NOT NULL THEN

        INSERT INTO instalacionescentro(instalacion, centro) 
        VALUES(inst_id, centro_id);

        IF ROW_COUNT() > 0 THEN
            SELECT 'Success' AS RESULT;
        ELSE 
            SELECT 'Failed' AS RESULT;
        END IF;
    ELSE
        SELECT 'Failed' AS RESULT;
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
        DB::unprepared("DROP PROCEDURE IF EXISTS create_new_inst_centro");
    }
};
