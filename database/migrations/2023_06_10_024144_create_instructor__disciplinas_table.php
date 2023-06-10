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
        Schema::create('instructor_disciplinas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_instructor');
            $table->unsignedBigInteger('id_disciplina');
            $table->primary(['id_instructor', 'id_disciplina']);
            
            $table->foreign('id_instructor')->references('id')->on('users');
            $table->foreign('id_disciplina')->references('id')->on('disciplinas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructor_disciplinas');
    }
};
