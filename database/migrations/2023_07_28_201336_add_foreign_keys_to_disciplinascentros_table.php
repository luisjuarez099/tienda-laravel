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
        Schema::table('disciplinascentros', function (Blueprint $table) {
            $table->foreign(['id_centro'], 'fk_centrodisciplina')->references(['idcentro'])->on('centro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_disciplina'], 'fk_disciplinacentro')->references(['iddisciplinas'])->on('disciplinas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['horario'], 'fk_horariodisciplina')->references(['idhorarios'])->on('horarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_profesor'], 'fk_profesordisciplinacentro')->references(['idprofesores'])->on('profesores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disciplinascentros', function (Blueprint $table) {
            $table->dropForeign('fk_centrodisciplina');
            $table->dropForeign('fk_disciplinacentro');
            $table->dropForeign('fk_horariodisciplina');
            $table->dropForeign('fk_profesordisciplinacentro');
        });
    }
};
