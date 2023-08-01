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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `update_centro_address`(
    IN CENTRO_ID INT,
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

    DECLARE already_exists INT;

    -- Check if the row already exists based on the data
    SELECT COUNT(*) INTO already_exists
    FROM centro AS c
    WHERE c.calle = CALLE AND c.numext = NUM_EXT AND c.numint = NUM_INT
            AND c.colonia = COLONIA AND c.cp = CP AND c.municipo = MUNICIPIO
            AND c.estado = ESTADO AND c.pais = PAIS AND c.eliminado IS FALSE;

    -- if centro exits -> failed
    IF already_exists > 0 THEN
        SELECT 'Failed' AS RESULT;
    ELSE
        -- execute update
        UPDATE centro AS c SET c.calle = CALLE, c.numext = NUM_EXT, 
            c.numint = NUM_INT, c.colonia = COLONIA, c.cp = CP, 
            c.municipo = MUNICIPIO, c.estado = ESTADO, c.pais = PAIS
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
        DB::unprepared("DROP PROCEDURE IF EXISTS update_centro_address");
    }
};
