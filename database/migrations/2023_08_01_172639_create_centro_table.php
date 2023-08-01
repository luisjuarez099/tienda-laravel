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
        Schema::create('centro', function (Blueprint $table) {
            $table->integer('idcentro', true);
            $table->string('nombre', 45);
            $table->string('calle', 45);
            $table->string('numext', 45);
            $table->string('numint', 45);
            $table->integer('colonia')->index('fk_centcol_idx');
            $table->integer('cp')->index('fk_centcopos_idx');
            $table->integer('municipo')->index('fk_centmun_idx');
            $table->integer('estado')->index('fk_centest_idx');
            $table->integer('pais')->index('fk_centpai_idx');
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
        Schema::dropIfExists('centro');
    }
};
