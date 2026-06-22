<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    // Avisa ao Laravel o nome correto da tabela em português
    protected $table = 'avaliacoes';

    // Libera o sistema para salvar as notas e os comentários
    protected $fillable = [
        'user_id', 
        'jogo_id', 
        'nota', 
        'comentario'
    ];
}