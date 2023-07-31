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
        Schema::table('stocktiendas', function (Blueprint $table) {
            $table->foreign(['producto'], 'fk_productostokentienda')->references(['catalogoproducto'])->on('catalogoproductos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['tiendacentro'], 'fk_tiendacentrostock')->references(['idtiendacentro'])->on('tiendacentros')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stocktiendas', function (Blueprint $table) {
            $table->dropForeign('fk_productostokentienda');
            $table->dropForeign('fk_tiendacentrostock');
        });
    }
};
