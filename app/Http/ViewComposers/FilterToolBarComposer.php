<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Hospital;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Route;
use App\Core\RouteName;

class FilterToolBarComposer
{
    protected $type;
    protected $request;
    protected $routeName = '';
    protected $parameters;

    public function __construct()
    {
        $this->routeName = Route::currentRouteName();
        $this->parameters = Route::current()->parameters();
        $this->request = Route::getCurrentRequest();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $hospitals = Hospital::get()->toArray();
        $specialists = Specialist::get()->toArray();
        $view->with('hospitals', $hospitals)
            ->with('specialists', $specialists);
        if ($this->request->get('hospital')) {
            $view->with('hospitalChecked', $this->request->get('hospital'));
        }
        if ($this->request->get('specialist')) {
            $view->with('specialistChecked', $this->request->get('specialist'));
        }
        if ($this->request->get('doctor')) {
            $view->with('doctorName', $this->request->get('doctor'));
        }
    }
}
