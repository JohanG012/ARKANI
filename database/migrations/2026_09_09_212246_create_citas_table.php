<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mascota_id')->constrained()->onDelete('cascade');
            $table->foreignId('veterinario_id')->constrained('veterinarios')->onDelete('cascade');
            $table->foreignId('clinica_id')->constrained()->onDelete('cascade');
            $table->date('fecha');
            $table->time('hora');
            $table->string('motivo'); // consulta general, vacunación, cirugía, etc.
            $table->string('estado')->default('pendiente'); // pendiente, confirmada, en_atencion, completada, cancelada
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};