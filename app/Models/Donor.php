<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Donor extends Model
{
    use HasFactory, Searchable;
    protected $fillable = ['name', 'fecha_nacimiento', 'tipo_sangre','genero','historial_medico','avatar'];
}
