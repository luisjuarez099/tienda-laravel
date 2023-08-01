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
        Schema::table('disciplinasprofesores', function (Blueprint $table) {
            $table->foreign(['id_disciplina'], 'fk_disciplinaprofesor')->references(['iddisciplinas'])->on('disciplinas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_profesor'], 'fk_profesordisciplina')->references(['idprofesores'])->on('profesores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disciplinasprofesores', function (Blueprint $table) {
            $table->dropForeign('fk_disciplinaprofesor');
            $table->dropForeign('fk_profesordisciplina');
        });
    }
};
