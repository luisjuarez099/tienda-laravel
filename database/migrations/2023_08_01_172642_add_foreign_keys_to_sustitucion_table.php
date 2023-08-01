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
        Schema::table('sustitucion', function (Blueprint $table) {
            $table->foreign(['horariosustitucionservicio'], 'fk_horariocentroservicio')->references(['idhorariocentroservicio'])->on('horariocentroservicio')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['profesorsustituto'], 'fk_profesorsustituto')->references(['idprofesores'])->on('profesores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['profesortitular'], 'fk_profesortitular')->references(['idprofesores'])->on('profesores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sustitucion', function (Blueprint $table) {
            $table->dropForeign('fk_horariocentroservicio');
            $table->dropForeign('fk_profesorsustituto');
            $table->dropForeign('fk_profesortitular');
        });
    }
};
