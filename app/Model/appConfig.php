<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class appConfig extends Model
{
    //
    protected $fillable = [
        'setting', 'value',
    ];
}
