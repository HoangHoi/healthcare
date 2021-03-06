<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Filterable;
use Storage;

class Doctor extends Model
{
    use Filterable;

    protected $table = 'doctors';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hospital_id', 'specialist_id', 'name', 'avatar', 'info', 'examination_fee',
    ];

    public function getAvatarAttribute($value)
    {
        $imageSrc = 'public/' . config('upload.path.images') . '/' . $value;
        if ($value && Storage::exists($imageSrc)) {
            return Storage::url($imageSrc);
        }
        return Storage::url('public/' . config('upload.path.default') . '/' . config('upload.default.doctor_image'));
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }

    public function times()
    {
        return $this->morphMany(Time::class, 'entityable');
    }

    public function requests()
    {
        return $this->morphMany(Request::class, 'entityable');
    }
}
