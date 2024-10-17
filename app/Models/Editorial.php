<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    // Relación: Una editorial tiene muchos libros
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}

