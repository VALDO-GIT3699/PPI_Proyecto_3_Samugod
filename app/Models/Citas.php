<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Citas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'usuario_id',
        'user_id', 
        'email', 
        'nombre', 
        'apellidoma', 
        'apellidopa', 
        'telefono', 
        'fecha', 
        'descripcion',  
        'doctor', 
        'estado'
    ];
        
    protected function casts(): array
    {
        return [
            'fecha' => 'date',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function consultorios()
    {
        return $this->belongsToMany(Consultorio::class, 'consultorio_cita', 'cita_id', 'consultorio_id');
    }
    

}
