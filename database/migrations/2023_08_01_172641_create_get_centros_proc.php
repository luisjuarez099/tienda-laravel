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
        pai.nombre AS PAIS
    FROM centro AS cen
    INNER JOIN colonia AS col ON cen.colonia=col.idcolonia
    INNER JOIN codigopostal AS cp ON cen.cp=cp.idcodigopostal
    INNER JOIN municipios AS mun ON cen.municipo=mun.idmunicipios
    INNER JOIN paises AS pai ON cen.pais=pai.idpaises
    INNER JOIN (
        SELECT 
            e.idestados,
            e.nombre AS estado
        FROM estados AS e
    ) AS est ON cen.estado=est.idestados;
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
