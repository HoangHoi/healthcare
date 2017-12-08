<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Time;
use App\Http\Requests\TimeRequest;
use Carbon\Carbon;

class DoctorTimeController extends Controller
{
    public function create(Doctor $doctor, TimeRequest $request) {
        $inputs = [
            'begin_time' => Carbon::parse($request->get('begin_time'))->toDateTimeString(),
            'end_time' => Carbon::parse($request->get('end_time'))->toDateTimeString(),
            'day_of_week' => $request->get('day_of_week'),
        ];

        $doctor->times()->create($inputs);
        return redirect(route('admin.doctors.getUpdate', ['doctor' => $doctor->id]) . '#time-list')
            ->with([
                'action' => 'create',
                'status' => 'success',
                'message' => 'Create doctor time successful.',
            ]);
    }

    public function delete(Doctor $doctor, Time $time) {
        if ($time->entityable_id == $doctor->id && $time->entityable_type == Doctor::class) {
            $time->delete();
        };

        return redirect(route('admin.doctors.getUpdate', ['doctor' => $doctor->id]) . '#time-list')
            ->with([
                'action' => 'delete',
                'status' => 'success',
                'message' => 'Delete doctor time successful.',
            ]);
    }
}
