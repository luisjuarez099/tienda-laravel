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
        Schema::create('sustitucion', function (Blueprint $table) {
            $table->integer('idsustitucion', true);
            $table->integer('profesortitular')->index('fk_profesortitular_idx');
            $table->integer('profesorsustituto')->index('fk_profesorsustituto_idx');
            $table->integer('horariosustitucionservicio')->index('fk_horariocentroservicio_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sustitucion');
    }
};
