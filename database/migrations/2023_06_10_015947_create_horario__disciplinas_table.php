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
        Schema::create('horario_disciplinas', function (Blueprint $table) {
            $table->UnsignedBigInteger('id');
            $table->UnsignedBigInteger('id_disciplina');
            $table->primary(['id_disciplina', 'id']);
            $table->foreign('id_disciplina')->references('id')->on('disciplinas')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('horario_disciplinas');
    }
};
