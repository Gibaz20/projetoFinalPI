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
    Schema::create('jogos', function (Blueprint $table) {
        $table->id();
        // ID original do jogo lá na RAWG API para fazer a busca depois
        $table->unsignedBigInteger('api_id')->unique(); 
        $table->string('nome');
        $table->string('imagem_capa')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogos');
    }
};
