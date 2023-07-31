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
        Schema::table('catalogoproductos', function (Blueprint $table) {
            $table->foreign(['proveedor'], 'fk_catalogoproveedores')->references(['idproveedores'])->on('proveedores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['tipoproducto'], 'fk_tipoproducto')->references(['idtipodeproducto'])->on('tipodeproducto')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catalogoproductos', function (Blueprint $table) {
            $table->dropForeign('fk_catalogoproveedores');
            $table->dropForeign('fk_tipoproducto');
        });
    }
};
