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
        Schema::table('socios', function (Blueprint $table) {
            $table->foreign(['cp'], 'fksociocop')->references(['idcodigopostal'])->on('codigopostal')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['colonia'], 'fk_sociocol')->references(['idcolonia'])->on('colonia')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['estado'], 'fk_socioest')->references(['idestados'])->on('estados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['municipio'], 'fk_sociomun')->references(['idmunicipios'])->on('municipios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['pais'], 'fk_sociopa')->references(['idpaises'])->on('paises')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('socios', function (Blueprint $table) {
            $table->dropForeign('fksociocop');
            $table->dropForeign('fk_sociocol');
            $table->dropForeign('fk_socioest');
            $table->dropForeign('fk_sociomun');
            $table->dropForeign('fk_sociopa');
        });
    }
};
