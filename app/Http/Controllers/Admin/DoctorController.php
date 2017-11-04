<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\QueryFilter\DoctorFilter;
use App\Models\Doctor;
use App\Http\Controllers\Admin\BaseController;

class DoctorController extends BaseController
{
    public function search(Request $request, DoctorFilter $query)
    {
        return Doctor::filterBy($query)->get()->toArray();
    }

    public function index()
    {
        $doctors = Doctor::with('hospital', 'specialist')
            ->get()
            ->mapWithKeys(function ($item, $idx) {
                $data = [
                    $idx + 1,
                    $item->name,
                    $item->hospital->name,
                    $item->specialist->name,
                    $item->examination_fee,
                    $item->info,
                ];
                return [$item->id => $data];
            })
            ->toArray();

        return view('admin.pages.doctor', [
            'items' => [
                'key' => [
                    'STT',
                    'Ten',
                    'Benh vien',
                    'Chuyen khoa',
                    'Phi kham',
                    'Thong tin',
                ],
                'data' => $doctors,
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
