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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `create_new_inscrito`(
    IN SOCIO INT,
    IN TORNEO VARCHAR(50),
    IN INICIO DATETIME,
    IN NOMBRE_EQUIPO VARCHAR(45),
    IN CUOTA DOUBLE,
    IN ESTATUS_PAGO TINYINT
)
BEGIN

    -- 1- Fetch id's from torneo
    DECLARE torneo_id INT;
    DECLARE torneo_cupo INT;
    DECLARE torneo_count INT;

    SELECT t.idtorneo, t.limite INTO torneo_id, torneo_cupo
    FROM torneo AS t
    WHERE t.nombre = TORNEO AND t.fechainicio = INICIO;

    -- Count rows for torneo with fechainicio
    SELECT COUNT(*) INTO torneo_count
    FROM inscritostorneo AS it
    WHERE it.torneo = torneo_id;

    -- If it's higher than cupo then return
    IF torneo_count > torneo_cupo THEN
        SELECT 'Cupo lleno, No se puede inscribir al torneo';
    ELSE

        -- Insert into inscritostorneo table
        INSERT INTO inscritostorneo (socio, cuota, estatuspago, nombreequipo, torneo)
        VALUES (SOCIO, CUOTA, ESTATUS_PAGO, NOMBRE_EQUIPO, torneo_id);
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
        DB::unprepared("DROP PROCEDURE IF EXISTS create_new_inscrito");
    }
};
