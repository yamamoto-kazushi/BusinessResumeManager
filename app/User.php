<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emproyee_no',
        'name',
        'name_kana',
        'birthday',
        'gender',
        'address',
        'country',
        'initial',
        'education',
        'graduate',
        'station',
        'qualifications',
        'email',
        'password',
        'login_failed',
        'admin_flag',
        'last_login_datetime',
        'last_update_datetime',
        'delete_flag'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
