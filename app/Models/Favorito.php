<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    // Garante que o Laravel use o nome correto em português
    protected $table = 'favoritos';

    protected $fillable = [
        'user_id',
        'jogo_id'
    ];

    //Avisa que este favorito pertence a um Jogo
    public function jogo()
    {
        return $this->belongsTo(Jogo::class, 'jogo_id');
    }
}