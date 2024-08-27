<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Các thuộc tính của model
    protected $fillable = [
        'userId',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public $incrementing = false;
    protected $primaryKey = 'userId';
    protected $keyType = 'string';
    public $timestamps = false;
}
