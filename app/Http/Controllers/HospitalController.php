<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\QueryFilter\HospitalFilter;
use App\Models\Hospital;

class HospitalController extends Controller
{
    public function search(Request $request, HospitalFilter $query)
    {
        return Hospital::filterBy($query)->get()->toArray();
    }
}
