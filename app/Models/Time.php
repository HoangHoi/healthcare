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
        'begin_time', 'end_time', 'day_of_week', 'entityable_id', 'entityable_type'
    ];

    public function entityable()
    {
        return $this->morphTo();
    }
}
