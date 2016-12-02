<?php

namespace App\Model;

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

    public function getId() {
      return $this->id;
    }
  
    public function setId($id) {
      $this->id = $id;
    }
  
    public function getName() {
      return $this->name;
    }
  
    public function setName($name) {
      $this->name = $name;
    }
  
    public function getEmail() {
      return $this->email;
    }
  
    public function setEmail($email) {
      $this->email = $email;
    }
  
    public function getPassword() {
      return $this->password;
    }
  
    public function setPassword($pass) {
      $this->password = $pass;
    }
  
    public function getRole() {
      return $this->role;
    }
  
    public function setRole($role) {
      $this->role = $role;
    }

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
        return $this->name;
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
