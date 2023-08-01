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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `update_inscrito_cuota`(
    IN SOCIO_ID INT,
    IN TORNEO_ID INT,
    IN NEW_CUOTA DOUBLE
)
BEGIN

    UPDATE inscritostorneo SET cuota = NEW_CUOTA 
    WHERE socio = SOCIO_ID AND torneo = TORNEO_ID;

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
        DB::unprepared("DROP PROCEDURE IF EXISTS update_inscrito_cuota");
    }
};
