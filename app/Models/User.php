<?php

namespace App\Models;

class User extends BaseUser
{
    const ITEMS_PER_PAGE = 10;
    protected $table = 'users';
}
