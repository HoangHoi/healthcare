<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Core\QueryFilter\SpecialistFilter;
use App\Http\Controllers\Controller;
use App\Models\Specialist;
use App\Http\Controllers\Admin\BaseController;

class SpecialistController extends BaseController
{
    public function search(Request $request, SpecialistFilter $query)
    {
        return Specialist::filterBy($query)->get()->toArray();
    }

    public function index()
    {
        $specialists = Specialist::get()
            ->mapWithKeys(function ($item, $idx) {
                $data = [
                    $idx + 1,
                    $item->name,
                    $item->description,
                ];
                return [$item->id => $data];
            })
            ->toArray();

        return view('admin.pages.specialist', [
            'items' => [
                'key' => [
                    'STT',
                    'Ten',
                    'Thong tin',
                ],
                'data' => $specialists,
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
