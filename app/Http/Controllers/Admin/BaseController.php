<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
    protected $guard = 'admin';

    public function __construct()
    {
        $this->middleware($this->authMiddleware());
    }
}
