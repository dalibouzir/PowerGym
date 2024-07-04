<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
