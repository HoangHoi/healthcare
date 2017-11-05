<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\SessionController as BaseController;
use Auth;

class SessionController extends BaseController
{
    protected $guard = 'admin';

    protected function userWasAuthenticated()
    {
        $guard = $this->getGuard();
        $user = Auth::guard($guard)->user();
        return redirect()->route('admin.doctors.index');
    }

    protected function getLogoutRedirectRoute()
    {
        return 'admin.login';
    }
}
