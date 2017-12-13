<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\QueryFilter\DoctorFilter;
use App\Models\Doctor;
use Carbon\Carbon;

class DoctorController extends Controller
{
    public function search(Request $request, DoctorFilter $query)
    {

        $doctors = Doctor::filterBy($query)
            ->with([
                'times' =>  function($query) {
                    $query->orderBy('begin_time', 'asc');
                },
                'hospital' =>  function($query) {
                    $query->select(['id', 'name', 'address']);
                },
                'specialist' =>  function($query) {
                    $query->select(['id', 'name']);
                },
            ])
            ->get()
            ->toArray();
        $doctors = collect($doctors)
            // ->filter(function ($doctor) {
            //     return count($doctor['times']);
            // })
            ->map(function ($item) {
                $item['times'] = $this->transformTimes($item);
                return $item;
            })
            ->values()
            ->toArray();
        return $doctors;
    }

    protected function transformTimes($item)
    {
        if (!count($item['times'])) {
            return [];
        }

        $result = [];
        $today = Carbon::now();
        $times = collect($item['times'])
            ->map(function ($item) {
                return [
                    'day' => $item['day_of_week'],
                    'time' => substr($item['begin_time'], 11, 5),
                    'link' => url($item['id']),
                ];
            })
            ->groupBy('day');
        for ($i = 0; $i < 7; $i++) {
            $day = $today->addDay(1);
            if (isset($times[$day->dayOfWeek])) {
                $key = config('day.' . $day->dayOfWeek) . ' - ' . $day->format('d/m');
                $result[$key] = [
                    'times' => $times[$day->dayOfWeek]->toArray(),
                    'times_json' => $times[$day->dayOfWeek]->toJson(),
                ];

            }
        }
        return $result;
    }
}
