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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `get_torneos`()
BEGIN

# fetch centro
WITH cte_cen AS (
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
    ) AS est ON cen.estado=est.idEstados
),

# fetch instalaciones
cte_inst AS (
    SELECT
        nombre AS INSTALACION,
        idInstalaciones AS ID
    FROM instalaciones
),

# fetch instalaciones centro
cte_cen_inst AS (
    SELECT 
        ic.idInstalacionesCentro AS ID,
        cen.CENTRO AS CENTRO, 
        ins.INSTALACION,
        cen.CALLE, 
        cen.NUMERO_EXT,
        cen.COLONIA, 
        cen.CODIGO_POSTAL, 
        cen.MUNICIPIO, 
        cen.ESTADO, 
        cen.PAIS
        FROM instalacionescentro AS ic
    INNER JOIN cte_cen AS cen ON ic.centro=cen.ID
    INNER JOIN cte_inst AS ins ON ic.instalacion=ins.ID
)

# get torneo, joins the 2 cte's (table variables) to get addresses and extra data
SELECT 
    t.idtorneo AS ID,
    t.nombre AS NOMBRE,
    d.nombre AS DEPORTE,
    DATE_FORMAT(t.fechainicio, '%d-%b-%Y %H:%i') AS INICIO,
    t.limite AS CUPO,
    count_torneo_inscritos(t.nombre, d.nombre, t.fechainicio, ci.CENTRO, ci.INSTALACION) AS INSCRITOS,
    ci.CENTRO,
    ci.INSTALACION,
    ci.CALLE,
    ci.NUMERO_EXT, 
    ci.COLONIA, 
    ci.CODIGO_POSTAL, 
    ci.MUNICIPIO, 
    ci.ESTADO, 
    ci.PAIS
FROM torneo AS t
INNER JOIN deportes AS d ON t.deporte=d.iddeportes
INNER JOIN cte_cen_inst AS ci ON t.instalacionescentro=ci.ID
WHERE t.fechainicio >= CURDATE() AND t.eliminado IS FALSE;
END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS get_torneos");
    }
};
