<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Filterable;
use Storage;

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
        'name', 'address', 'description', 'image'
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function getImageAttribute($value)
    {
        $imageSrc = 'public/' . config('upload.path.images') . '/' . $value;
        if (Storage::exists($imageSrc)) {
            return Storage::url($imageSrc);
        }
        return Storage::url('public/' . config('upload.path.default') . '/' . config('upload.default.hospital_image'));
    }
}
