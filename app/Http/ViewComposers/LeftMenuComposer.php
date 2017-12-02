<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Hospital;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Route;
use App\Core\RouteName;

class LeftMenuComposer
{
    protected $type;
    protected $request;
    protected $routeName = '';
    protected $parameters;

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
        switch ($this->routeName) {
            case RouteName::HOSPITAL_INDEX_PAGE:
                $hospitals = Hospital::get()->toArray();
                $view->with('hospitals', $hospitals);
                break;

            case RouteName::HOSPITAL_SHOW_PAGE:
                $hospitals = Hospital::get()->toArray();
                $view->with('hospitals', $this->addActiveParam($hospitals, $this->parameters['hospital']->id));
                break;

            case RouteName::SPECIALIST_INDEX_PAGE:
                $specialists = Specialist::get()->toArray();
                $view->with('specialists', $specialists);
                break;

            case RouteName::SPECIALIST_SHOW_PAGE:
                $specialists = Specialist::get()->toArray();
                $view->with('specialists', $this->addActiveParam($specialists, $this->parameters['specialist']->id));
                break;

            case RouteName::HOME_PAGE:
            default:
                $hospitals = Hospital::limit(config('menu.limit_items'))->get();
                $specialists = Specialist::limit(config('menu.limit_items'))->get();
                $view->with('hospitals', $hospitals)
                    ->with('specialists', $specialists);
        }
    }

    protected function addActiveParam(array $lists, $idActived)
    {
        foreach ($lists as $key => $item) {
            if ($item['id'] == $idActived) {
                $lists[$key]['menuActived'] = true;
            } else {
                $lists[$key]['menuActived'] = false;
            }
        }
        return $lists;
    }
}
