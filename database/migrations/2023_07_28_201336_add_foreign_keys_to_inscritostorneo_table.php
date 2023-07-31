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
        Schema::table('inscritostorneo', function (Blueprint $table) {
            $table->foreign(['socio'], 'fk_socioinscrito')->references(['idsocios'])->on('socios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['torneo'], 'fk_torneoinscripcion')->references(['idtorneo'])->on('torneo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscritostorneo', function (Blueprint $table) {
            $table->dropForeign('fk_socioinscrito');
            $table->dropForeign('fk_torneoinscripcion');
        });
    }
};
