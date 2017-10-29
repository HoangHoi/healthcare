<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\QueryFilter\SpecialistFilter;
use App\Models\Specialist;

class SpecialistController extends Controller
{
    public function search(Request $request, SpecialistFilter $query)
    {
        return Specialist::filterBy($query)->get()->toArray();
    }
}
