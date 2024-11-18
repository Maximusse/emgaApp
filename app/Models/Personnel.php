<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'contact', 'date_naiss', 'lieu_naiss', 'email', 'matricul', 'sexe', 'mecano', 'photo',
    ];
}
