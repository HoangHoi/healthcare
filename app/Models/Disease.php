<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $table = 'diseases';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];
}
