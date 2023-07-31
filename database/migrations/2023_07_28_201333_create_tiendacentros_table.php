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
        Schema::create('tiendacentros', function (Blueprint $table) {
            $table->integer('idtiendacentro', true);
            $table->integer('centro')->index('fk_centro_idx');
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
        Schema::dropIfExists('tiendacentros');
    }
};
