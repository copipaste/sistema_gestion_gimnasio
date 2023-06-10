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
        Schema::create('horario__membresias', function (Blueprint $table) {
            $table->UnsignedBigInteger('id');
            $table->UnsignedBigInteger('id_membresia');
            $table->primary(['id_membresia', 'id']);
            $table->foreign('id_membresia')->references('id')->on('membresias')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('dia', ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo']);
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario__membresias');
    }
};
