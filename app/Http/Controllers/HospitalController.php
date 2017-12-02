<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\QueryFilter\HospitalFilter;
use App\Models\Hospital;
use App\Http\ViewComposers\LeftMenuComposer;

class HospitalController extends Controller
{
    public function search(Request $request, HospitalFilter $query)
    {
        return Hospital::filterBy($query)->get()->toArray();
    }

    public function index()
    {
        return view('pages.hospital');
    }

    public function show(Hospital $hospital, $hospitalName)
    {
        return view('pages.hospital');
    }
}
