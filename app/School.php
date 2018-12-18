<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'user_id', 'category'
    ];
    public function report()
    {
        return $this->hasMany(Request::class);
    }
}
