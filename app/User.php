<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'username', 'access', 'zone', 'district', 'school', 'grade', 'gender', 'name', 'l_name', 'fa_name',
        'birth', 'birth_location', 'religion', 'last_score', 'phone_home', 'mobile', 'fa_job', 'phone_parent', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function school()
    {
        return $this->hasMany(School::class);
    }
}
