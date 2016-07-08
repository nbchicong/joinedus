<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isSuperAdmin() {
        return strtoupper($this->role) == 'SUPER_ADMIN';
    }

    public function isAdmin() {
        return strtoupper($this->role) == 'ADMIN';
    }

    public function isWriter() {
        return strtoupper($this->role) == 'WRITER';
    }

    public function isUser() {
        return strtoupper($this->role) == 'USER';
    }

    public function getUsername() {
        return $this->email;
    }

    public function hasRole($role) {
        if (strtoupper($role) == 'SUPER_ADMIN') {
            return $this->isSuperAdmin();
        }
        if (strtoupper($role) == 'ADMIN') {
            return ($this->isSuperAdmin() || $this->isAdmin());
        }
        if (strtoupper($role) == 'WRITER') {
            return ($this->isSuperAdmin() || $this->isAdmin() || $this->isWriter());
        }
        return $this->role == $role;
    }
}
