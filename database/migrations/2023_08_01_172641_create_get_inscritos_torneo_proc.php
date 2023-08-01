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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `get_inscritos_torneo`()
BEGIN

# fetch socios
WITH cte_socios AS (
    SELECT 
    s.idSocios AS ID,
    s.nombres AS NOMBRES,
    s.apellidop AS AP_PATERNO,
    s.apellidom AS AP_MATERNO,
    s.mensualidad AS MENSUALIDAD,
    s.calle AS CALLE,
    s.numExt AS NUMERO_EXT,
    col.nombre AS COLONIA,
    cp.cp AS CODIGO_POSTAL,
    m.nombre AS MUNICIPIO,
    e.nombre AS ESTADO
FROM socios AS s
INNER JOIN colonia AS col ON s.colonia=col.idcolonia
INNER JOIN codigopostal AS cp ON s.cp=cp.idcodigopostal
INNER JOIN municipios AS m ON s.municipio=m.idMunicipios
INNER JOIN estados AS e ON s.estado=e.idEstados
),

# fetch centro
cte_cen AS (
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
        ic.idinstalacionescentro AS ID,
        cen.CENTRO, 
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
),

# fetch torneo
cte_torneos AS (
    SELECT 
        t.idtorneo AS ID,
        t.nombre AS NOMBRE,
        d.nombre AS DEPORTE,
        t.limite AS CUPO,
        t.fechainicio AS INICIO,
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
    INNER JOIN deportes AS d ON t.deporte=d.idDeportes
    INNER JOIN cte_cen_inst AS ci ON t.instalacionesCentro=ci.ID
)

# fetch inscritos torneo
SELECT
    it.idinscritostorneo AS ID,
    s.NOMBRES,
    s.AP_PATERNO,
    s.AP_MATERNO,
    s.MENSUALIDAD,
    t.NOMBRE AS TORNEO, 
    it.cuota AS CUOTA,
    CASE WHEN it.estatusPago=TRUE THEN 'PAGADO' ELSE 'PENDIENTE' END AS ESTATUS_PAGO,
    it.nombreEquipo AS EQUIPO,
    t.DEPORTE, 
    t.CUPO, 
    DATE_FORMAT(t.INICIO, '%d-%m-%Y %H:%i') AS INICIO,
    t.CENTRO,
    t.INSTALACION
FROM inscritostorneo AS it
INNER JOIN cte_socios AS s ON it.socio=s.ID
INNER JOIN cte_torneos AS t ON it.torneo=t.ID
WHERE t.INICIO > CURDATE() AND it.eliminado IS FALSE;

END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS get_inscritos_torneo");
    }
};
