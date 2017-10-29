<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\QueryFilter\DoctorFilter;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function search(Request $request, DoctorFilter $query)
    {
        return Doctor::filterBy($query)->get()->toArray();
    }
}
