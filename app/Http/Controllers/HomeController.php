<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\QueryFilter\DoctorFilter;
use App\Models\Doctor;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, DoctorFilter $query)
    {
        $doctors = Doctor::filterBy($query)
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
        return view('pages.home', ['doctors' => $doctors]);
    }

    protected function transformTimes($doctor)
    {
        $result = [];
        $today = Carbon::now();
        $times = collect($doctor['times'])
            ->map(function ($item) use ($doctor) {

                return [
                    'day' => $item['day_of_week'],
                    'time' => substr($item['begin_time'], 11, 5),
                    'link' => route('booking.index') . "?type=bac-sy&doctor_id={$doctor['id']}&date_time=",
                ];
            })
            ->groupBy('day');
        for ($i = 0; $i < 7; $i++) {
            $day = $today->addDay(1);
            if (isset($times[$day->dayOfWeek])) {
                $key = config('day.' . $day->dayOfWeek) . ' - ' . $day->format('d/m');
                $tms = $this->addDateTimeToLink($times[$day->dayOfWeek], $day);
                $result[$key] = [
                    'times' => $tms->toArray(),
                    'times_json' => $tms->toJson(),
                ];
            }
        }
        return $result;
    }

    protected function addDateTimeToLink($times, $day)
    {
        $dayString = $day->toDateString();

        return $times->map(function ($time) use ($dayString) {
            $time['link'] = $time['link'] . "{$dayString} {$time['time']}#service-detail";
            return $time;
        });
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
