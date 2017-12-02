<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Hospital;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Route;
use App\Core\RouteName;

class BreadcrumbComposer
{
    protected $type;
    protected $request;
    protected $routeName = '';
    protected $parameters;
    protected $paths = [
        'doctor' => [
            'name' => 'Bác sỹ',
            'route_name' => 'doctor',
            'route_params' => [],
        ],
        'doctor.show' => [
            'name' => 'getDoctorName',
            'route_name' => 'doctor',
            'route_params' => ['doctorName', 'doctor'],
        ],
        'hospital' => [
            'name' => 'Bệnh viện',
            'route_name' => 'hospital.index',
            'route_params' => [],
        ],
        'hospital.show' => [
            'name' => 'getHospitalName',
            'route_name' => 'hospital.show',
            'route_params' => ['hospitalName', 'hospital'],
        ],
        'service' => [
            'name' => 'Dịch vụ',
            'route_name' => 'service.index',
            'route_params' => [],
        ],
        'service.show' => [
            'name' => 'getServiceName',
            'route_name' => 'service.show',
            'route_params' => ['serviceName', 'service'],
        ],
        'specialist' => [
            'name' => 'Chuyên khoa',
            'route_name' => 'specialist.index',
            'route_params' => [],
        ],
        'specialist.show' => [
            'name' => 'getSpecialistName',
            'route_name' => 'specialist.show',
            'route_params' => ['specialistName', 'specialist'],
        ],
        'booking' => [
            'name' => 'Đặt lịch khám',
            'route_name' => 'booking.index',
            'route_params' => [],
        ],
    ];
    protected $keySecondary = [
        'show',
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
        $breadcrumb = [
            [
                'name' => 'Trang chủ',
                'route_name' => 'home',
                'route_params' => [],
                'is_active' => false,
            ],
        ];

        $routeNameArray = explode('.', $this->routeName);
        $breadcrumb = $this->addActiveParam($this->getBreadcrumb($routeNameArray, $breadcrumb));

        $view->with('breadcrumb', $breadcrumb);
    }

    protected function getBreadcrumb(array $paths, array $previousBreadcrumb = [], string $previousPath = '')
    {
        $pathSearch = '';
        if (!count($paths)) {
            return $previousBreadcrumb;
        }
        $path = array_shift($paths);
        if (in_array($path, $this->keySecondary)) {
            $pathSearch = "{$previousPath}.{$path}";
        } else {
            $pathSearch = $path;
        }
        if (array_key_exists($pathSearch, $this->paths)) {
            $newItem = $this->paths[$pathSearch];
            if (count($newItem['route_params'])) {
                $newItem['route_params'] = $this->getRouteParams($newItem['route_params']);
            }
            $newItem['is_active'] = false;
            if (method_exists($this, $newItem['name'])) {
                $newItem['name'] = $this->{$newItem['name']}();
            }
            $previousBreadcrumb[] = $newItem;
        }
        return $this->getBreadcrumb($paths, $previousBreadcrumb, $path);
    }

    protected function addActiveParam(array $breadcrumb)
    {
        $breadcrumb[count($breadcrumb) -1]['is_active'] = true;
        return $breadcrumb;
    }

    protected function getRouteParams(array $paramNames)
    {
        $params = [];
        foreach ($paramNames as $value) {
            $functionName = 'get' . studly_case($value);

            if (method_exists($this, $functionName)) {
                $params[$value] = $this->{$functionName}();
            } else {
                $params[$value] = $this->parameters[$value];
            }
        }
        return $params;
    }

    protected function getHospital()
    {
        return $this->parameters['hospital']->id;
    }

    protected function getHospitalName()
    {
        return $this->parameters['hospital']->name;
    }

    protected function getSpecialist()
    {
        return $this->parameters['specialist']->id;
    }

    protected function getSpecialistName()
    {
        return $this->parameters['specialist']->name;
    }

    protected function getService()
    {
        return $this->parameters['service']->id;
    }

    protected function getServiceName()
    {
        return $this->parameters['service']->name;
    }

    protected function getDoctor()
    {
        return $this->parameters['doctor']->id;
    }

    protected function getDoctorName()
    {
        return $this->parameters['doctor']->name;
    }
}
