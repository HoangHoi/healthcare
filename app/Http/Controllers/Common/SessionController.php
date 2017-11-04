<?php
namespace App\Http\Controllers\Common;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Validation\ValidationException;

abstract class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => ['logout', 'getAuth']]);
        $this->middleware($this->authMiddleware(), ['only' => ['logout', 'getAuth']]);
    }

    abstract protected function userWasAuthenticated();
    abstract protected function getLogoutRedirectRoute();

    public function getLogin()
    {
        return view($this->getGuard() . '.pages.login');
    }

    public function postLogin(LoginRequest $request)
    {
        if ($this->attemptLogin($request)) {
            return $this->userWasAuthenticated();
        }

        return $this->responseToFailedLogin();
    }

    public function logout(Request $request)
    {
        Auth::guard($this->getGuard())->logout();
        if ($request->ajax()) {
            return $this->response(['status' => true]);
        }
        return redirect()->route($this->getLogoutRedirectRoute());
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $this->getLoginCredentials($request);
        return Auth::guard($this->getGuard())->attempt($credentials, true);
    }

    protected function getLoginCredentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    }

    protected function responseToFailedLogin()
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
}
