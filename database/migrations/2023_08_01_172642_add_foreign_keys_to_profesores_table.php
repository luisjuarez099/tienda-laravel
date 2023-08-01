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
        Schema::table('profesores', function (Blueprint $table) {
            $table->foreign(['gradoestudios'], 'fk_estudios')->references(['idgradosestudio'])->on('gradosestudio')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['cp'], 'fk_profcopo')->references(['idcolonia'])->on('colonia')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['colonia'], 'fk_profesocol')->references(['idcolonia'])->on('colonia')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['estado'], 'fk_profest')->references(['idestados'])->on('estados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['municipio'], 'fk_profmun')->references(['idmunicipios'])->on('municipios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profesores', function (Blueprint $table) {
            $table->dropForeign('fk_estudios');
            $table->dropForeign('fk_profcopo');
            $table->dropForeign('fk_profesocol');
            $table->dropForeign('fk_profest');
            $table->dropForeign('fk_profmun');
        });
    }
};
