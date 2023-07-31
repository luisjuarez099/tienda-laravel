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
        Schema::table('codigopostal', function (Blueprint $table) {
            $table->foreign(['id_municipio'], 'fk_codigopostalmunicipio')->references(['idmunicipios'])->on('municipios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('codigopostal', function (Blueprint $table) {
            $table->dropForeign('fk_codigopostalmunicipio');
        });
    }
};
