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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `delete_inscrito_torneo`(
    IN SOCIO_ID INT,
    IN TORNEO_ID INT
)
BEGIN

    IF SOCIO_ID IS NOT NULL AND TORNEO_ID IS NOT NULL THEN
        UPDATE inscritostorneo SET eliminado = TRUE
        WHERE socio = SOCIO_ID AND torneo = TORNEO_ID;
    END IF;

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
        DB::unprepared("DROP PROCEDURE IF EXISTS delete_inscrito_torneo");
    }
};
