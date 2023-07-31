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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->integer('idproveedores', true);
            $table->string('razonsocial', 65);
            $table->string('rfc', 20);
            $table->boolean('tipopersona');
            $table->boolean('situacionFiscal');
            $table->boolean('activo');
            $table->string('calle', 45);
            $table->string('numext', 5);
            $table->string('numint', 5)->nullable();
            $table->integer('cp')->index('fk_provedorescop_idx');
            $table->integer('colonia')->index('fk_provedorcol_idx');
            $table->integer('municipio')->index('fk_provedormun_idx');
            $table->integer('pais')->index('fk_provedorpa_idx');
            $table->integer('estado')->index('fk_proveest_idx');
            $table->string('deleted_at', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
};
