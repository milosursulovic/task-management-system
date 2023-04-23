<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as BaseUser;

class CustomUser extends BaseUser implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = "custom_users";

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // admin, non_admin
    ];
}
