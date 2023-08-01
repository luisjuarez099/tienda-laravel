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
        Schema::create('stocktiendas', function (Blueprint $table) {
            $table->integer('idstocktienda', true);
            $table->integer('producto')->index('fk_productostokentienda_idx');
            $table->integer('tiendacentro')->index('fk_tiendacentrostock_idx');
            $table->double('cantidad');
            $table->boolean('promocion')->nullable();
            $table->tinyInteger('mespromocion')->nullable();
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
        Schema::dropIfExists('stocktiendas');
    }
};
