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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->Integer('nro_carnet');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->date('fecha_nacimiento');
            $table->Integer('telefono_principal');
            $table->Integer('telefono_emergencia')->nullable();
            $table->string('email', 80);
            $table->enum('sexo', ['Masculino', 'Femenino']);
            $table->string('tipo_sangre', 50)->nullable();
            $table->decimal('peso', 5, 2)->nullable();
            $table->string('direccion', 150)->nullable();
            $table->string('password', 255);
            $table->unsignedBigInteger('id_tarjeta')->nullable();
            $table->unsignedBigInteger('id_rol');
            $table->unsignedBigInteger('id_periodo')->nullable();
            $table->unsignedBigInteger('id_membresia')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('remember_token', 100)->nullable();

           
            $table->foreign('id_rol')->references('id')->on('roles')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_periodo')->references('id')->on('periodos')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_membresia')->references('id')->on('membresias')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
