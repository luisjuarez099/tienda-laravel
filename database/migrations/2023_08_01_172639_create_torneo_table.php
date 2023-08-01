<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneo', function (Blueprint $table) {
            $table->integer('idtorneo', true);
            $table->string('nombre', 50);
            $table->integer('deporte')->index('fk_deportetorneo_idx');
            $table->tinyInteger('limite');
            $table->dateTime('fechainicio');
            $table->integer('instalacionescentro')->index('fk_instalacionescentrotorneo_idx');
            $table->boolean('eliminado')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('torneo');
    }
};
