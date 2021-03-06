<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\QueryFilter\DoctorFilter;
use App\Models\Doctor;
use App\Models\Specialist;
use App\Models\Hospital;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\DoctorRequest;
use App\Core\Uploader\ImageUploader;

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
                    $item->hospital ? $item->hospital->name : '',
                    $item->specialist ? $item->specialist->name : '',
                    $item->examination_fee,
                    $item->info,
                ];
                return [$item->id => $data];
            })
            ->toArray();

        return view('admin.pages.doctor.list', [
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
            ],
            'baseUrl' => route('admin.doctors.index'),
            'specialists' => Specialist::all(),
            'hospitals' => Hospital::all(),
        ]);
    }

    public function create(DoctorRequest $request)
    {
        $newDoctor = $request->only([
            'hospital_id',
            'specialist_id',
            'name',
            'info',
            'examination_fee',
        ]);
        if ($request->hasFile('avatar')) {
            $newDoctor['avatar'] = (new ImageUploader)->make($request->file('avatar'));
        } else {
            $newDoctor['avatar'] = '';
        }
        Doctor::create($newDoctor);
        return redirect()->route('admin.doctors.index')
            ->with([
                'action' => 'create',
                'status' => 'success',
                'message' => 'Create doctor successful.',
            ]);
    }

    public function getUpdate(Doctor $doctor)
    {
        return view('admin.pages.doctor.update', [
            'doctor' => $doctor,
            'specialists' => Specialist::all(),
            'hospitals' => Hospital::all(),
        ]);
    }

    public function update(Doctor $doctor, DoctorRequest $request)
    {
        $updateRequest = $request->only(['hospital_id', 'specialist_id', 'name', 'info', 'examination_fee']);
        if ($request->hasFile('avatar')) {
            $updateRequest['avatar'] = (new ImageUploader)->make($request->file('avatar'));
        }
        $doctor->update($updateRequest);
        return redirect()->route('admin.doctors.index')
            ->with([
                'action' => 'update',
                'status' => 'success',
                'message' => 'Update doctor successful.',
            ]);
    }

    public function delete(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('admin.doctors.index')
            ->with([
                'action' => 'delete',
                'status' => 'success',
                'message' => 'Delete doctor successful.',
            ]);
    }
}
