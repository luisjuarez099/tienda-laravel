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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `get_centros`()
BEGIN
    SELECT 
        cen.idcentro AS ID,
        cen.nombre AS CENTRO,
        cen.calle AS CALLE,
        cen.numExt AS NUMERO_EXT,
        col.nombre AS COLONIA,
        cp.cp AS CODIGO_POSTAL,
        mun.nombre AS MUNICIPIO,
        est.estado AS ESTADO,
        est.pais AS PAIS
    FROM centro AS cen
    INNER JOIN colonia AS col ON cen.idcentro=col.idcolonia
    INNER JOIN codigopostal AS cp ON cen.cp=cp.idcodigopostal
    INNER JOIN municipios AS mun ON cen.municipo=mun.idmunicipios
    INNER JOIN (
        SELECT 
            e.idEstados,
            e.nombre AS estado,
            pai.nombre AS pais
        FROM estados AS e
        INNER JOIN paises AS pai ON e.idpais=pai.idPaises
    ) AS est ON cen.estado=est.idEstados;
END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS get_centros");
    }
};
