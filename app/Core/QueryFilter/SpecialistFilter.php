<?php

namespace App\Core\QueryFilter;

use Carbon\Carbon;

class SpecialistFilter extends BaseFilter
{
    protected $masterTable = 'specialists';

    protected $quickSearchFields = ['name'];
}
