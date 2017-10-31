<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('pages.booking', [
            'topActive' => 1,
        ]);
    }

    public function store(Request $request)
    {
        return view('pages.booking-success', [
            'topActive' => 1,
        ]);
        // dd($request->all());
    }
}
