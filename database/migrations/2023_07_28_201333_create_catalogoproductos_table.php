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
        Schema::create('catalogoproductos', function (Blueprint $table) {
            $table->integer('catalogoproducto', true);
            $table->string('nombre', 45);
            $table->mediumText('descripcion');
            $table->double('costo');
            $table->double('precio');
            $table->integer('proveedor')->index('fk_catalogoproveedores_idx');
            $table->integer('tipoproducto')->index('fk_tipodeproducto_idx');
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
        Schema::dropIfExists('catalogoproductos');
    }
};
