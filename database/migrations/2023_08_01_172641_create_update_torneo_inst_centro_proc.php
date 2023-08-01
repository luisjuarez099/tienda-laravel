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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `update_torneo_inst_centro`(
    IN TORNEO_ID INT,
    IN CENTRO VARCHAR(45),
    IN INSTALACION VARCHAR(45)
)
BEGIN

    DECLARE inst_cen_id INT;

    SELECT find_inst_centro_id(CENTRO, INSTALACION) INTO inst_cen_id;

    IF inst_cen_id IS NOT NULL THEN
        UPDATE torneo SET instalacionescentro = inst_cen_id
        WHERE idtorneo = TORNEO_ID;
    END IF;

    IF ROW_COUNT() > 0 THEN
        SELECT 'Success';
    ELSE
        SELECT 'Failed';
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
        DB::unprepared("DROP PROCEDURE IF EXISTS update_torneo_inst_centro");
    }
};
