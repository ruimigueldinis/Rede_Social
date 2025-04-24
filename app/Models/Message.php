<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;
    protected $fillable = [
        'date',
        'idUser',
        'text',
        'order' // Adicionado para mexer na ordem das mensagens
    ];

    //Adicionar relacionamentos, como associar uma Mensagem a um User!

    public function user()
    {
        return $this->belongsTo(User::class,'idUser');
    }

}
