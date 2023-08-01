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
        Schema::create('instalacionescentro', function (Blueprint $table) {
            $table->integer('idinstalacionescentro', true);
            $table->integer('instalacion')->index('fk_instalacioncentro_idx');
            $table->integer('centro')->index('fk_centroinstalacion_idx');
            $table->boolean('eliminado')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instalacionescentro');
    }
};
