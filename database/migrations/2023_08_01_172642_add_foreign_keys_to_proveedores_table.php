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
        Schema::table('proveedores', function (Blueprint $table) {
            $table->foreign(['colonia'], 'fk_provedorcol')->references(['idcolonia'])->on('colonia')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['cp'], 'fk_provedorescop')->references(['idcodigopostal'])->on('codigopostal')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['municipio'], 'fk_provedormun')->references(['idmunicipios'])->on('municipios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['pais'], 'fk_provedorpa')->references(['idpaises'])->on('paises')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['estado'], 'fk_proveest')->references(['idestados'])->on('estados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proveedores', function (Blueprint $table) {
            $table->dropForeign('fk_provedorcol');
            $table->dropForeign('fk_provedorescop');
            $table->dropForeign('fk_provedormun');
            $table->dropForeign('fk_provedorpa');
            $table->dropForeign('fk_proveest');
        });
    }
};
