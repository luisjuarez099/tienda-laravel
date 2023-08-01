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
        Schema::table('instalacionescentro', function (Blueprint $table) {
            $table->foreign(['centro'], 'fk_centroinstalacion')->references(['idcentro'])->on('centro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['instalacion'], 'fk_instalacioncentro')->references(['idinstalaciones'])->on('instalaciones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instalacionescentro', function (Blueprint $table) {
            $table->dropForeign('fk_centroinstalacion');
            $table->dropForeign('fk_instalacioncentro');
        });
    }
};
