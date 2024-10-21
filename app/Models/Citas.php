<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id', 
        'email', 
        'nombre', 
        'apellidoma', 
        'apellidopa', 
        'telefono', 
        'fecha', 
        'descripcion', 
        'consultorio', 
        'doctor', 
        'estado'
    ];
        
    protected function casts(): array
    {
        return [
            'fecha' => 'date',
        ];
    }

}
