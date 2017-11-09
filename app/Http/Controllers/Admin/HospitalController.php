<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\QueryFilter\HospitalFilter;
use App\Models\Hospital;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\HospitalRequest;
use App\Core\Uploader\ImageUploader;

class HospitalController extends BaseController
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
            ],
            'baseUrl' => route('admin.hospitals.index'),
        ]);
    }

    public function create(HospitalRequest $request)
    {
        $newHospital = $request->only([
            'name',
            'address',
            'description',
        ]);
        if ($request->hasFile('image')) {
            $newHospital['image'] = (new ImageUploader)->make($request->file('image'));
        } else {
            $newHospital['image'] = '';
        }
        Hospital::create($newHospital);
        return redirect()->route('admin.hospitals.index')
            ->with([
                'action' => 'create',
                'status' => 'success',
                'message' => 'Create hospital successful.',
            ]);
    }

    public function getUpdate(Hospital $hospital)
    {
        return view('admin.pages.hospital-update', [
            'hospital' => $hospital,
        ]);
    }

    public function update(Hospital $hospital, HospitalRequest $request)
    {
        $updateRequest = $request->only(['name', 'address', 'description']);
        if ($request->hasFile('image')) {
            $updateRequest['image'] = (new ImageUploader)->make($request->file('image'));
        } else {
            $updateRequest['image'] = '';
        }
        $hospital->update($updateRequest);
        return redirect()->route('admin.hospitals.index')
            ->with([
                'action' => 'update',
                'status' => 'success',
                'message' => 'Update hospital successful.',
            ]);
    }

    public function delete(Hospital $hospital)
    {
        $hospital->delete();
        return redirect()->route('admin.hospitals.index')
            ->with([
                'action' => 'delete',
                'status' => 'success',
                'message' => 'Delete hospital successful.',
            ]);
    }
}
