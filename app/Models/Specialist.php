<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Filterable;

class Specialist extends Model
{
    use Filterable;

    protected $table = 'specialists';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    public function doctors()
    {
        return $this->hasMany('Doctor');
    }
}
