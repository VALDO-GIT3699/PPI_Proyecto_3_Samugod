<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['tag'];
    
    public function citas()
    {
        return $this->belongsToMany(Citas::class);
    }
}
