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
        Schema::table('torneo', function (Blueprint $table) {
            $table->foreign(['deporte'], 'fk_deportetorneo')->references(['iddeportes'])->on('deportes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['instalacionescentro'], 'fk_instalacionescentrotorneo')->references(['idinstalacionescentro'])->on('instalacionescentro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('torneo', function (Blueprint $table) {
            $table->dropForeign('fk_deportetorneo');
            $table->dropForeign('fk_instalacionescentrotorneo');
        });
    }
};
