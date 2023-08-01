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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `create_new_instalacion`(
    IN NOMBRE VARCHAR(45)
    )
BEGIN
    INSERT INTO instalaciones(nombre) 
    VALUES(NOMBRE);

    IF ROW_COUNT() > 0 THEN
        SELECT 'Success' AS RESULT;
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
        DB::unprepared("DROP PROCEDURE IF EXISTS create_new_instalacion");
    }
};
