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
        Schema::create('productos_montaje', function (Blueprint $table) {
            $table->unsignedBigInteger('id_producto_montaje')->primary();
            $table->foreign('id_producto_montaje')->references('id')->on('articulos')->onDelete('cascade');
            $table->string('categoria');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_montaje');
    }
};
