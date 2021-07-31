<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table="estudiante";
    protected $fillable=[
        "idEstudiante",
        "nombre",
        "apellido"
    ];

    protected $primaryKey="idEstudiante";
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
