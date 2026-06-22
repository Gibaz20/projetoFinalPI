<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    // Libera estas colunas para serem salvas no banco
    protected $fillable = [
        'api_id', 
        'nome', 
        'imagem_capa'
    ];
}