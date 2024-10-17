<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeUsers extends Model
{
    use HasFactory;

    protected $table = 'type_users';

    protected $fillable = [
        'code_type_users',
        'libelle_type_users',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'type_users_id');
    }
}
