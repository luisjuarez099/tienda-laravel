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
        Schema::create('socios', function (Blueprint $table) {
            $table->integer('idsocios', true);
            $table->string('nombres', 65);
            $table->string('apellidop', 50);
            $table->string('apellidom', 50)->nullable();
            $table->string('calle', 45);
            $table->string('numext', 45);
            $table->string('numint', 45)->nullable();
            $table->integer('colonia')->index('fk_sociocol_idx');
            $table->integer('cp')->index('fksociocop_idx');
            $table->integer('municipio')->index('fk_sociomun_idx');
            $table->integer('estado')->index('fk_socioest_idx');
            $table->integer('pais')->index('fk_sociopa_idx');
            $table->double('mensualidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socios');
    }
};
