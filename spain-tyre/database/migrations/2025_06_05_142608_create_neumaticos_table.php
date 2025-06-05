<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('neumaticos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_neumatico')->primary();
            $table->foreign('id_neumatico')->references('id')->on('articulos')->onDelete('cascade');

            $table->string('modelo');
            $table->string('ancho');
            $table->string('perfil');
            $table->string('diametro');
            $table->string('indice_carga');
            $table->string('indice_velocidad');
            $table->string('tipo_vehiculo');
            $table->string('estacion');
            $table->string('ruido_db');
            $table->string('consumo');
            $table->string('agarre');
            $table->date('fecha_fabricacion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neumaticos');
    }
};
