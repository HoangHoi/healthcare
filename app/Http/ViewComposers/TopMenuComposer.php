<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Hospital;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Route;
use App\Core\RouteName;

class TopMenuComposer
{
    protected $type;
    protected $request;
    protected $routeName = '';
    protected $parameters;
    protected $topMenu = [
        'home' => 0,
        'booking.index' => 1,
        'hospital.index' => 2,
        'hospital.show' => 2,
        'specialist.index' => 3,
        'specialist.show' => 3,
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
        $topActive = 0;
        if (array_key_exists($this->routeName, $this->topMenu)) {
            $topActive = $this->topMenu[$this->routeName];
        }
        $view->with('topActive', $topActive);
    }
}
