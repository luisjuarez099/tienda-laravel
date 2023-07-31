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
        Schema::create('salas_comunes', function (Blueprint $table) {
            $table->integer('idsalas_comunes', true);
            $table->string('nombre', 45)->nullable()->index('fk_sala_idx');
            $table->integer('idcentro')->nullable()->index('fk_centrodisciplinacentro_idx');
            $table->integer('iddisciplina')->nullable()->index('fk_disciplinadcentro_idx');
            $table->integer('idprofesor')->nullable()->index('fk_profesordisciplinacentro_idx');
            $table->integer('idhorario')->nullable()->index('fk_horariodisciplinacentro_idx');
            $table->tinyInteger('estatus')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salas_comunes');
    }
};
