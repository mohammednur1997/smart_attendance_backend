<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LanguageWord extends Model
{
    //
    protected $fillable = [
        'word', 'english', 'bangla', 'arabic', 'db_status',
    ];
}
