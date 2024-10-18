<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_SUPER_ADMIN = 1;
    const ROLE_ADMIN = 2;
    const ROLE_USER = 3;

    const DORH_USER = 1;
    const COMPAGNIE_USER = 2;
    const DIVISION_USER = 3;
    const MESSE_USER = 4;

    const ACTIVE = 1;
    const DESACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code_user',
        'name',
        'email',
        'status',
        'is_active',
        'password',
        'roles_id',
        'type_users_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles()
    {
        return $this->belongsTo(Roles::class, 'roles_id');
    }

    public function typeUsers()
    {
        return $this->belongsTo(TypeUsers::class, 'type_users_id');
    }

    public function privileges()
    {
        return $this->hasMany(Privileges::class, 'users_id');
    }

    // Utilisé pour le middleware
    public function isActive()
    {
        if ($this->is_active == self::ACTIVE) {
            return true;
        }
        if ($this->is_active == self::DESACTIVE) {
            return false;
        }
    }

    public function typeUserData()
    {
        $type = TypeUsers::where('id', $this->type_users_id)->get();
        return $type[0]->libelle_type_users;
    }

    // ---------------------ROLES-------------------------//
    // Admin user
    public function isSuperAdmin()
    {
        if ($this->roles_id == self::ROLE_SUPER_ADMIN) {
            return true;
        }
    }
    // Admin user
    public function isAdmin()
    {
        if ($this->roles_id == self::ROLE_ADMIN) {
            return true;
        }
    }
    // user
    public function isUser()
    {
        if ($this->roles_id == self::ROLE_USER) {
            return true;
        }
    }
    // ---------------------ROLES-------------------------//



    // DORH user
    public function isDorhUser()
    {
        if ($this->type_users_id == self::DORH_USER || $this->roles_id == self::ROLE_SUPER_ADMIN) {
            return true;
        }
    }

    // COMPAGNIE user
    public function isCompagnieUser()
    {
        if ($this->type_users_id == self::COMPAGNIE_USER || $this->roles_id == self::ROLE_SUPER_ADMIN) {
            return true;
        }
    }

    // DIVISION user
    public function isDivisionUser()
    {
        if ($this->type_users_id == self::DIVISION_USER || $this->roles_id == self::ROLE_SUPER_ADMIN) {
            return true;
        }
    }

    // MESSE user
    public function isMesseUser()
    {
        if ($this->type_users_id == self::MESSE_USER || $this->roles_id == self::ROLE_SUPER_ADMIN) {
            return true;
        }
    }
}
