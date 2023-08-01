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
        Schema::create('horariocentroservicio', function (Blueprint $table) {
            $table->integer('idhorariocentroservicio', true);
            $table->integer('centroservicio')->index('fk_serviciocentro_idx');
            $table->integer('horariol')->index('fk_horarioL_idx');
            $table->integer('horariom')->index('fk_horariom_idx');
            $table->integer('horariomi')->index('fk_horariomi_idx');
            $table->integer('horarioj')->index('fk_horarioj_idx');
            $table->integer('horariov')->index('fk_horariov_idx');
            $table->integer('profesor')->index('fk_profesor_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horariocentroservicio');
    }
};
