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
    Schema::create('avaliacoes', function (Blueprint $table) {
        $table->id();
        
        // Quem está avaliando? (Liga com a tabela users)
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        
        // Qual jogo está sendo avaliado? (Liga com a tabela jogos)
        $table->foreignId('jogo_id')->constrained('jogos')->onDelete('cascade');
        
        // Os dados da avaliação que desenhamos no Front-End
        $table->integer('nota'); // Vai receber o valor das estrelas (1 a 5)
        $table->text('comentario');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacaos');
    }
};
