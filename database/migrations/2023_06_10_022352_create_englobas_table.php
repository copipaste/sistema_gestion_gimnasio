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
        Schema::create('englobas', function (Blueprint $table) {
            $table->UnsignedBigInteger('id_membresia');
            $table->UnsignedBigInteger('id_disciplina');
            $table->primary(['id_membresia', 'id_disciplina']);
            $table->foreign('id_membresia')->references('id')->on('membresias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_disciplina')->references('id')->on('disciplinas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('englobas');
    }
};
