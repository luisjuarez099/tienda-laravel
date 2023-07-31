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
        Schema::create('entrenamientopersonal', function (Blueprint $table) {
            $table->integer('identrenamientopersonal')->primary();
            $table->integer('id_socio')->index('fk_socioentrenamiento_idx');
            $table->integer('id_profesor')->index('fk_profesorentrenamiento_idx');
            $table->integer('id_disciplina')->index('fk_disciplinaentrenamiento_idx');
            $table->integer('horarioinicio')->index('fk_horarioentrenamiento_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrenamientopersonal');
    }
};
