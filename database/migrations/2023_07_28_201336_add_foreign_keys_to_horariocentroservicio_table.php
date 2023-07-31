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
        Schema::table('horariocentroservicio', function (Blueprint $table) {
            $table->foreign(['horarioj'], 'fk_horarioj')->references(['idhorarios'])->on('horarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['horariol'], 'fk_horarioL')->references(['idhorarios'])->on('horarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['horariom'], 'fk_horariom')->references(['idhorarios'])->on('horarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['horariomi'], 'fk_horariomi')->references(['idhorarios'])->on('horarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['horariov'], 'fk_horariov')->references(['idhorarios'])->on('horarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['profesor'], 'fk_profesor')->references(['idprofesores'])->on('profesores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['centroservicio'], 'fk_serviciocentro2')->references(['idserviciocentro'])->on('serviciocentro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horariocentroservicio', function (Blueprint $table) {
            $table->dropForeign('fk_horarioj');
            $table->dropForeign('fk_horarioL');
            $table->dropForeign('fk_horariom');
            $table->dropForeign('fk_horariomi');
            $table->dropForeign('fk_horariov');
            $table->dropForeign('fk_profesor');
            $table->dropForeign('fk_serviciocentro2');
        });
    }
};
