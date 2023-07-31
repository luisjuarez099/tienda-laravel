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
        Schema::table('serviciocentro', function (Blueprint $table) {
            $table->foreign(['centro'], 'fk_centroservicio')->references(['idcentro'])->on('centro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['servicio'], 'fk_serviciocentro')->references(['idservicios'])->on('servicios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('serviciocentro', function (Blueprint $table) {
            $table->dropForeign('fk_centroservicio');
            $table->dropForeign('fk_serviciocentro');
        });
    }
};
