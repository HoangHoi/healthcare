<?php

namespace App\Core\QueryFilter;

use Carbon\Carbon;

class DoctorFilter extends BaseFilter
{
    protected $masterTable = 'doctors';

    protected $quickSearchFields = ['name'];
}
