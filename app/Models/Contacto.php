<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable = [
        "nombre",
        "apellido",
        "telefono",
        "direccion",
        "grupo_id",
        "email",
        "user_id",
    ];
    use HasFactory;
}
