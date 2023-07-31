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
        Schema::create('serviciocentro', function (Blueprint $table) {
            $table->integer('idserviciocentro', true);
            $table->integer('servicio')->index('fk_serviciocentro_idx');
            $table->integer('centro')->index('fk_centroservicio_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serviciocentro');
    }
};
