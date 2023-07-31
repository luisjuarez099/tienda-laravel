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
        Schema::create('profesores', function (Blueprint $table) {
            $table->integer('idprofesores')->primary();
            $table->string('nombre', 45);
            $table->string('apellidop', 45);
            $table->string('apellidom', 45)->nullable();
            $table->string('calle', 45);
            $table->string('numext', 45);
            $table->string('numint', 45)->nullable();
            $table->integer('colonia')->index('fk_profesocol_idx');
            $table->integer('cp')->index('fk_profcopo_idx');
            $table->integer('municipio')->index('fk_profmun_idx');
            $table->integer('estado')->index('fk_profest_idx');
            $table->integer('gradoestudios')->index('fk_estudios_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profesores');
    }
};
