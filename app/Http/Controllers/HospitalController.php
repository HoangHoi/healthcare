<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\QueryFilter\HospitalFilter;
use App\Models\Hospital;
use App\Http\ViewComposers\LeftMenuComposer;
use Carbon\Carbon;

class HospitalController extends Controller
{
    public function search(Request $request, HospitalFilter $query)
    {
        return Hospital::filterBy($query)->get()->toArray();
    }

    public function index()
    {
        return view('pages.hospital.index');
    }

    public function show(Hospital $hospital, $hospitalName)
    {
        $doctors = $hospital->doctors()
            ->with([
                'times' =>  function($query) {
                    $query->orderBy('begin_time', 'asc');
                },
                'hospital' =>  function($query) {
                    $query->select(['id', 'name']);
                },
                'specialist' =>  function($query) {
                    $query->select(['id', 'name']);
                },
            ])
            ->get()
            ->toArray();
        $doctors = collect($doctors)
            ->filter(function ($doctor) {
                return count($doctor['times']);
            })
            ->map(function ($item) {
                $item['times'] = $this->transformTimes($item);
                return $item;
            })
            ->toArray();
        return view('pages.hospital.show', ['doctors' => $doctors]);
    }

    protected function transformTimes($item)
    {
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
