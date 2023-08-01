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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `create_new_centro`(
    IN NOMBRE VARCHAR(45),
    IN CALLE VARCHAR(45),
    IN NUM_EXT VARCHAR(45),
    IN NUM_INT VARCHAR(45),
    IN COLONIA INT,
    IN CP INT,
    IN MUNICIPIO INT,
    IN ESTADO INT,
    IN PAIS INT
    )
BEGIN

    INSERT INTO centro (nombre, calle, numext, numint, colonia, cp, municipo, estado, pais)
    VALUES(NOMBRE, CALLE, NUM_EXT, NUM_INT, COLONIA, CP, MUNICIPIO, ESTADO, PAIS);

    IF ROW_COUNT() > 0 THEN
        SELECT 'Success';
    ELSE
        SELECT 'Failed';
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
        DB::unprepared("DROP PROCEDURE IF EXISTS create_new_centro");
    }
};
