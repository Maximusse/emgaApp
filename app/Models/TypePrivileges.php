<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePrivileges extends Model
{
    use HasFactory;

    protected $table = 'type_privileges';

    protected $fillable = [
        'code_type_privileges',
        'libelle_type_privileges',
    ];

    public function privileges()
    {
        return $this->hasMany(Privileges::class, 'type_privileges_id');
    }
}
