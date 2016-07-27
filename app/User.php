<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const ROLE_USER = 1;
    const ROLE_DOCTOR = 2;
    const ROLE_ADMIN = 100;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name', 'first_name', 'middle_name', 'email', 'password', 'phone', 'role_id', 'photo', 'sex'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function getRoleName($role_id) {
        $role = Role::find($role_id);
        return $role->name;
    }

    public function isDoctor(User $user) {
        if ($user->role_id == User::ROLE_DOCTOR) {
            return true;
        }
        return false;
    }

    public function isAdmin() {
        return $this->guarded;
    }

    /**
     * Use const ROLE_USER and ROLE_DOCTOR for check
     * @param $role_id
     * @return bool
     */
    public function is($role_id) {
        if ($this->role_id == $role_id) {
            return true;
        }
        return false;
    }
}
