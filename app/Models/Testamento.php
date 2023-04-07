<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testamento extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    // Para não usar data de criação e de atualizacao
    // public $timestamps = false;

    /**
     * Pegar todos os livros vinculados
     */
    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}
