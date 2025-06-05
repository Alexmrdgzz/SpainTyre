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
        Schema::create('detalle_carrito', function (Blueprint $table) {
            $table->unsignedBigInteger('id_carrito');
            $table->unsignedBigInteger('id_articulo');
            $table->integer('cantidad')->default(1);
            $table->foreign('id_carrito')->references('id_carrito')->on('carritos')->onDelete('cascade');
            $table->foreign('id_articulo')->references('id')->on('articulos')->onDelete('cascade');

            // Clave primaria compuesta
            $table->primary(['id_carrito', 'id_articulo']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_carrito');
    }
};
