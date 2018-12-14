<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    protected $fillable = [
        'user_id', 'title', 'question','question_file','question_seen'
    ];
}
