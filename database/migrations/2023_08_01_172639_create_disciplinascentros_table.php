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
        Schema::create('disciplinascentros', function (Blueprint $table) {
            $table->integer('iddisciplinascentro', true);
            $table->integer('id_centro')->index('fk_centrodisciplina_idx');
            $table->integer('id_disciplina')->index('fk_disciplinacentro_idx');
            $table->integer('id_profesor')->index('fk_profesor_idx');
            $table->integer('horario')->index('fk_horariodisciplina_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplinascentros');
    }
};
