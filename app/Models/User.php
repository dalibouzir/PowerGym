<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "users";


    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'profile_image',
        'role',
        'is_suspended', // Add is_suspended to fillable array
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_suspended' => 'boolean', // Cast is_suspended to boolean
    ];

    public function isAdmin1()
    {
        // List of admin emails
        $adminEmails = ['admin@gmail.com'];

        // Check if this user's email is in the list of admin emails
        return in_array($this->email, $adminEmails);
    }
    public function isAdmin(){
        return $this->role == 'admin';
    }
    // Additional methods to check user roles
    public function isMember() {
        return $this->role == 'member';
    }


    public function unsuspend()
    {
        $this->update(['is_suspended' => false]);
    }
    public function isTrainer() {
        return $this->role == 'trainers';
    }
}
