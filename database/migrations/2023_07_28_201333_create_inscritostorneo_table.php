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
        Schema::create('inscritostorneo', function (Blueprint $table) {
            $table->integer('idinscritostorneo', true);
            $table->integer('socio')->index('fk_socioinscrito_idx');
            $table->double('cuota');
            $table->boolean('estatuspago');
            $table->string('nombreequipo', 45);
            $table->integer('torneo')->index('fk_torneoinscripcion_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscritostorneo');
    }
};
