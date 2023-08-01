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
        DB::unprepared("CREATE DEFINER=`equipo1`@`%` PROCEDURE `create_new_torneo`(
    IN TORNEO VARCHAR(45),
    IN DEPORTE VARCHAR(45),
    IN LIMITE TINYINT,
    IN INICIO DATETIME,
    IN CENTRO VARCHAR(45),
    IN INSTALACION VARCHAR(45)
    )
BEGIN

DECLARE inst_cen_id INT;
DECLARE deporte_id INT;
DECLARE already_created INT;

# fetch instalacion centro id
SELECT find_inst_centro_id(CENTRO, INSTALACION) INTO inst_cen_id;

# fetch deporte id
SELECT find_deporte_id(DEPORTE) INTO deporte_id;

SELECT is_torneo_already_created(TORNEO, DEPORTE, INICIO, CENTRO, INSTALACION) INTO already_created;

IF already_created > 0 THEN
    SELECT 'Success' AS RESULT;
ELSE
    INSERT INTO torneo (nombre, deporte, limite, fechainicio, instalacionescentro)
    VALUES(TORNEO, deporte_id, LIMITE, INICIO, inst_cen_id);

    SELECT 'Failed' AS RESULT;
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
        DB::unprepared("DROP PROCEDURE IF EXISTS create_new_torneo");
    }
};
