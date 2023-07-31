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
    IN NOMBRES VARCHAR(65),
    IN APELLIDO_P VARCHAR(50),
    in APELLIDO_M VARCHAR(50),
    IN TORNEO VARCHAR(50),
    IN FECHA_INICIO DATETIME
)
BEGIN
    # find id of socio
    # find id of torneo
    # delete by idsocio and idtorneo
    DELETE FROM inscritostorneo AS it
    WHERE it.torneo IN (
        SELECT t.idtorneo 
        FROM torneo AS t 
        WHERE t.nombre=TORNEO 
        AND t.fechainicio=FECHA_INICIO
    )
    AND it.socio IN (
        SELECT s.idsocios 
        FROM socios AS s 
        WHERE s.nombres=NOMBRES
        AND s.apellidop=APELLIDO_P
        AND s.apellidom=APELLIDO_M
    );
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
