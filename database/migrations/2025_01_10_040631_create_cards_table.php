<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{

    public function up(): void
    {
        Schema::connection('mongodb')->create('cards', function (Blueprint $table) {
            $table->id(); // ID único de la carta
            $table->string('nombre'); // Nombre de la carta
            $table->string('tipo'); // Tipo de carta
            $table->integer('hp'); // Puntos de vida
            $table->string('rareza'); // Rareza de la carta
            $table->decimal('precio', 8, 2); // Precio de la carta
            $table->string('imagen_url')->nullable(); // URL de la imagen
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('cards');
    }
}
