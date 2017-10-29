<?php

namespace App\Core\QueryFilter;

use Carbon\Carbon;

class HospitalFilter extends BaseFilter
{
    protected $masterTable = 'hospitals';

    protected $quickSearchFields = ['name', 'address'];
}
