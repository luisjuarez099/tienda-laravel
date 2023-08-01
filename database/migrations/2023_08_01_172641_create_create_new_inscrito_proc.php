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
    IN DEPORTE VARCHAR(50),
    IN INICIO DATETIME,
    IN CENTRO VARCHAR(50),
    IN INSTALACION VARCHAR(45),
    IN EQUIPO VARCHAR(45),
    IN CUOTA DOUBLE,
    IN ESTATUS_PAGO TINYINT
)
BEGIN

    -- 1- Fetch id's from torneo
    DECLARE torneo_id INT;
    DECLARE torneo_cupo INT;
    DECLARE torneo_count INT;
    DECLARE already_inscrito INT;

    -- Find torneo id
    SELECT find_torneo_id(TORNEO, DEPORTE, INICIO, CENTRO, INSTALACION) INTO torneo_id;

    -- Count rows for torneo with fechainicio
    SELECT count_torneo_inscritos(TORNEO, DEPORTE, INICIO, CENTRO, INSTALACION) INTO torneo_count;

    -- validar que el socio no este inscrito ya en el torneo
    SELECT is_socio_already_inscrito_in_torneo(SOCIO, TORNEO, DEPORTE, INICIO, CENTRO, INSTALACION) 
    INTO already_inscrito;

    -- If inscritos in torneo is higher than cupo then return
    IF torneo_count > torneo_cupo THEN
        SELECT 'Failed' AS RESULT;
    END IF;

    IF already_inscrito > 0 THEN
        SELECT 'Failed' AS RESULT;
    ELSE
        -- Insert into inscritostorneo table
        INSERT INTO inscritostorneo (socio, cuota, estatuspago, nombreequipo, torneo)
        VALUES (SOCIO, CUOTA, ESTATUS_PAGO, EQUIPO, torneo_id);
        SELECT 'Success' AS RESULT;
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
