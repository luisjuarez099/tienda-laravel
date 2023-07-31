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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `get_socios_by_apellidos`(IN apellidoP VARCHAR(50), apellidoM VARCHAR(50))
BEGIN
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
WHERE s.apellidop=apellidoP AND s.apellidom=apellidoM;
END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS get_socios_by_apellidos");
    }
};
