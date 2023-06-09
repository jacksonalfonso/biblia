<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traducao extends Model
{
    use HasFactory;

    protected $fillable = ['nome','abreviacao','idioma_id'];


    public function idiomas()
    {
        return $this->hasMany(Idioma::class);
    }
}
