<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Autenticatable;

class User extends Autenticatable
{
    public $table = 'users';

    public $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string'
    ];

    public static $rules = [
        'name' => 'required|string',
        'email' => 'required|string|email',
        'password' => 'required|string|min:8',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
