<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    const PENDING = 1;
    const ACCEPTED = 2;
    const RESOLVE = 3;

    protected $table = 'requests';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id', 'name', 'email', 'phone_number', 'address', 'date', 'status', 'entityable_id', 'entityable_type'
    ];

    public function entityable()
    {
        return $this->morphTo();
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
