<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('N_reparacion');
            $table->string('N_Serie');
            $table->string('Codigo_Cliente');
            $table->string('Albaran_Cliente');
            $table->string('Marca');
            $table->string('Modelo');
            $table->string('N_RMA');
            $table->string('Pendiente_Material');
            $table->string('Recogido');
            $table->string('Fecha_Reparacion');
            $table->string('Fecha_Salida');
            $table->string('Fecha_Entrada');
            $table->string('ACABADO');
            $table->string('Garantia');
            $table->string('Pte_Presu');
            $table->string('Presu_Pte_Acept');
            $table->string('Estado');
            $table->string('PRESUPUESTO');
            $table->string('ACEPTADO_P');
            $table->string('NO_ACEPTADO_P');
            $table->string('PTE_MATERIAL_P');
            $table->string('ACABADO_P');
            $table->string('PAGADO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparaciones');
    }
}
