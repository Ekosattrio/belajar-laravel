<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    protected $table = 'mahasiswa';

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];
}
