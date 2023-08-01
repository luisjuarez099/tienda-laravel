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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `update_torneo_inicio`(
    IN TORNEO VARCHAR(45),
    IN DEPORTE VARCHAR(45),
    IN INICIO DATETIME,
    IN CENTRO VARCHAR(45),
    IN INSTALACION VARCHAR(45),
    IN NEW_INICIO DATETIME
)
BEGIN
    DECLARE torneo_id INT;
    DECLARE torneo_exists INT;

    SELECT find_torneo_id(TORNEO, DEPORTE, INICIO, CENTRO, INSTALACION) INTO torneo_id;

    -- saber si el nuevo torneo existe
    SELECT is_torneo_already_created(TORNEO, DEPORTE, NEW_INICIO, CENTRO, INSTALACION) INTO torneo_exists;

    -- si el torneo no existe ejecutamos el update
    IF torneo_exists < 1 THEN
        UPDATE torneo SET fechainicio = NEW_INICIO WHERE idtorneo = torneo_id;
    END IF;

    -- comprobar si hubo filas afectadas (actualizadas)
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
        DB::unprepared("DROP PROCEDURE IF EXISTS update_torneo_inicio");
    }
};
