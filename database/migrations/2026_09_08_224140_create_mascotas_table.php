<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->string('nombre');
            $table->string('especie'); // perro, gato, ave, etc.
            $table->string('raza')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('sexo')->nullable(); // macho, hembra
            $table->decimal('peso', 5, 2)->nullable(); // en kg, ej: 12.50
            $table->string('color')->nullable();
            $table->string('foto')->nullable(); // ruta de la imagen
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};