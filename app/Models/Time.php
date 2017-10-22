<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Time extends Model
{
    protected $table = 'times';

    protected $dates = [
        'content',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'day_of_week',
    ];
}
