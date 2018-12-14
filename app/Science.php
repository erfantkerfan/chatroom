<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Science extends Model
{
    protected $fillable = [
        'user_id', 'title', 'question','question_file','question_seen','answer','answer_file','answer_seen'
    ];
}
