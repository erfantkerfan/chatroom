<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'school_id', 'title', 'question','question_file','question_seen','answer','answer_file','answer_seen'
    ];
}
