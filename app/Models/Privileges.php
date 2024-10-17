<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privileges extends Model
{
    use HasFactory;

    protected $table = 'privileges';

    protected $fillable = [
        'code_privileges',
        'users_id',
        'type_privileges_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function typePrivileges()
    {
        return $this->belongsTo(TypePrivileges::class, 'type_privileges_id');
    }
}
