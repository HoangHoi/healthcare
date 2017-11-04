<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\QueryFilter\HospitalFilter;
use App\Models\Hospital;

class HospitalController extends Controller
{
    public function search(Request $request, HospitalFilter $query)
    {
        return Hospital::filterBy($query)->get()->toArray();
    }

    public function index()
    {
        $hospitals = Hospital::get()
            ->mapWithKeys(function ($item, $idx) {
                $data = [
                    $idx + 1,
                    $item->name,
                    $item->address,
                    $item->description,
                ];
                return [$item->id => $data];
            })
            ->toArray();

        return view('admin.pages.hospital', [
            'items' => [
                'key' => [
                    'STT',
                    'Ten',
                    'Dia chi',
                    'Thong tin',
                ],
                'data' => $hospitals,
            ]
        ]);
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
