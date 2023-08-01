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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `update_torneo_cupo`(
    IN TORNEO VARCHAR(45),
    IN DEPORTE VARCHAR(45),
    IN INICIO DATETIME,
    IN CENTRO VARCHAR(45),
    IN INSTALACION VARCHAR(45),
    IN NEW_CUPO TINYINT
)
BEGIN
    DECLARE torneo_id INT;

    SELECT find_torneo_id(TORNEO, DEPORTE, INICIO, CENTRO, INSTALACION) INTO torneo_id;

    UPDATE torneo SET limite = NEW_CUPO WHERE idtorneo = torneo_id;

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
        DB::unprepared("DROP PROCEDURE IF EXISTS update_torneo_cupo");
    }
};
