<?php

namespace App\Core\QueryFilter;

use Carbon\Carbon;

class DoctorFilter extends BaseFilter
{
    protected $masterTable = 'doctors';

    protected $quickSearchFields = ['name'];

    protected $avaiableFilters = [
        'quick_search' => 'quick_search',
        'hospital' => 'hospital',
        'specialist' => 'specialist',
        'doctor' => 'doctor',
        'order' => [
            'sort_by' => 'sort_by',
            'sort_type' => 'sort_type',
        ],
    ];

    protected function applyHospitalFilter()
    {
        $pattern = (int)$this->getFilterValue($this->avaiableFilters['hospital']);
        if (!$pattern) {
            return true;
        }

        return $this->builder->where('hospital_id', $pattern);
    }

    protected function applySpecialistFilter()
    {
        $pattern = (int)$this->getFilterValue($this->avaiableFilters['specialist']);
        if (!$pattern) {
            return true;
        }

        return $this->builder->where('specialist_id', $pattern);
    }

    protected function applyDoctorFilter()
    {
        $pattern = $this->getFilterValue($this->avaiableFilters['doctor']);
        if (!$pattern) {
            return true;
        }

        return $this->builder->where("{$this->masterTable}.name", 'LIKE', "%{$pattern}%");
    }
}
