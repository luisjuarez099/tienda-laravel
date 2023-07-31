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
        Schema::create('disciplinasprofesores', function (Blueprint $table) {
            $table->integer('iddisciplinasprofesores', true);
            $table->integer('id_disciplina')->index('fk_disciplinaprofesor_idx');
            $table->integer('id_profesor')->index('fk_profesordisciplina_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplinasprofesores');
    }
};
