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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `delete_torneo`(
    IN NOMBRE VARCHAR(50),
    IN FECHA_INICIO DATETIME
)
BEGIN
    UPDATE torneo AS t
    SET t.fechainicio = '1500-01-01 00-00-00'
    WHERE t.nombre = NOMBRE AND t.fechainicio = FECHA_INICIO;
END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS delete_torneo");
    }
};
