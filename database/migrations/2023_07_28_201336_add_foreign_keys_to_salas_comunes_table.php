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
        Schema::table('salas_comunes', function (Blueprint $table) {
            $table->foreign(['idcentro'], 'fk_centroc')->references(['id_centro'])->on('disciplinascentros')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['iddisciplina'], 'fk_disciplinace')->references(['id_disciplina'])->on('disciplinascentros')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['idhorario'], 'fk_horarioc')->references(['horario'])->on('disciplinascentros')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['idprofesor'], 'fk_profesorc')->references(['id_profesor'])->on('disciplinascentros')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salas_comunes', function (Blueprint $table) {
            $table->dropForeign('fk_centroc');
            $table->dropForeign('fk_disciplinace');
            $table->dropForeign('fk_horarioc');
            $table->dropForeign('fk_profesorc');
        });
    }
};
