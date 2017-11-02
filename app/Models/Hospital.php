<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Filterable;

class Hospital extends Model
{
    use Filterable;

    protected $table = 'hospitals';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'description',
    ];

    public function doctors()
    {
        return $this->hasMany('Doctor');
    }
}
