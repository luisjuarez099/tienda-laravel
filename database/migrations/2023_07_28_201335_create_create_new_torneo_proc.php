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
    IN NOMBRE VARCHAR(45),
    IN DEPORTE VARCHAR(45),
    IN LIMITE TINYINT,
    IN INICIO DATETIME,
    IN INS_CENTRO VARCHAR(45)
    )
BEGIN

DECLARE centro_id INT;
DECLARE deporte_id INT;
DECLARE torneo_count INT;

# fetch centro id
SELECT find_centro_id(INS_CENTRO) INTO centro_id;

# fetch deporte id
SELECT find_deporte_id(DEPORTE) INTO deporte_id;

SELECT COUNT(*) INTO torneo_count 
FROM torneo AS t
WHERE t.nombre=NOMBRE
    AND t.fechainicio=INICIO
    AND t.deporte=deporte_id
    AND t.instalacionescentro=centro_id;

IF torneo_count > 0 THEN
    SELECT 'El torneo que se intenta ingresar ya esta registrado';
ELSE
    INSERT INTO torneo (nombre, deporte, limite, fechainicio, instalacionescentro)
    VALUES(NOMBRE, deporte_id, LIMITE, INICIO, centro_id);
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
