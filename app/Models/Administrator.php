<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrator extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'administrator';

    protected $hidden = [ 'password' ];

    protected $fillable = [ 'full_name', 'login', 'password',];
}
