<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Hospital;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Route;
use App\Core\RouteName;
use Carbon\Carbon;

class TimeTableComposer
{
    protected $type;
    protected $request;
    protected $routeName = '';
    protected $parameters;
    protected $routesHasTimeList = [
        'admin.doctors.getUpdate' => 'doctor',
    ];

    public function __construct()
    {
        $this->routeName = Route::currentRouteName();
        $this->parameters = Route::current()->parameters();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (array_key_exists($this->routeName, $this->routesHasTimeList)) {
            $entity = $this->parameters[$this->routesHasTimeList[$this->routeName]];
            $timeList = $entity->times()
                ->get()
                ->mapWithKeys(function ($item, $idx) {
                    $data = [
                        $idx + 1,
                        Carbon::parse($item->begin_time)->format('H:i'),
                        Carbon::parse($item->end_time)->format('H:i'),
                        config('day.' . $item->day_of_week),
                    ];
                    return [$item->id => $data];
                })
                ->toArray();
            $view->with('items', [
                    'key' => [
                        'STT',
                        'Thoi gian bat dau',
                        'Thoi gian ket thuc',
                        'Thu',
                    ],
                    'data' => $timeList,
                ])
                ->with('timeUrl', 'times');
        }

        return redirect()->route('home');
    }
}
