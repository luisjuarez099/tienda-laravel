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
        Schema::table('entrenamientopersonal', function (Blueprint $table) {
            $table->foreign(['id_disciplina'], 'fk_disciplinaentrenamiento')->references(['iddisciplinas'])->on('disciplinas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['horarioinicio'], 'fk_horarioentrenamiento')->references(['idhorarios'])->on('horarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_profesor'], 'fk_profesorentrenamiento')->references(['idprofesores'])->on('profesores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_socio'], 'fk_socioentrenamiento')->references(['idsocios'])->on('socios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entrenamientopersonal', function (Blueprint $table) {
            $table->dropForeign('fk_disciplinaentrenamiento');
            $table->dropForeign('fk_horarioentrenamiento');
            $table->dropForeign('fk_profesorentrenamiento');
            $table->dropForeign('fk_socioentrenamiento');
        });
    }
};
