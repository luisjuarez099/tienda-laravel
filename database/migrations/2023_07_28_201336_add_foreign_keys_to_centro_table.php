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
        Schema::table('centro', function (Blueprint $table) {
            $table->foreign(['colonia'], 'fk_centcol')->references(['idcolonia'])->on('colonia')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['cp'], 'fk_centcopos')->references(['idcodigopostal'])->on('codigopostal')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['estado'], 'fk_centest')->references(['idestados'])->on('estados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['municipo'], 'fk_centmun')->references(['idmunicipios'])->on('municipios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['pais'], 'fk_centpai')->references(['idpaises'])->on('paises')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('centro', function (Blueprint $table) {
            $table->dropForeign('fk_centcol');
            $table->dropForeign('fk_centcopos');
            $table->dropForeign('fk_centest');
            $table->dropForeign('fk_centmun');
            $table->dropForeign('fk_centpai');
        });
    }
};
