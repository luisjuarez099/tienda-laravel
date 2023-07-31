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
        Schema::create('codigopostal', function (Blueprint $table) {
            $table->integer('idcodigopostal')->primary();
            $table->string('cp', 45);
            $table->integer('id_municipio')->index('fk_codigopostalmunicipio_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codigopostal');
    }
};
