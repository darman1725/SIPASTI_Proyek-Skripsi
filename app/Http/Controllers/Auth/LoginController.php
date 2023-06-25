<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    protected $redirectTo = RouteServiceProvider::HOME;
    protected $username;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->username = $this->findUsername();
    }

    public function findUsername()
    {
        $login = request()->input('login');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    public function username()
    {
        return $this->username;
    }

    function authenticated(Request $request, $user)
    {
    if ($user->level == 'user') {
        return redirect('/menu/dashboard_user')->with('success', 'Selamat, Anda berhasil masuk ke dalam website SIPASTI!');
    } else if ($user->level == 'admin') {
        return redirect('/menu/dashboard')->with('success', 'Selamat, Anda berhasil masuk ke dalam website SIPASTI!');
    } else {
        return redirect('/menu/dashboard')->with('error', 'Mohon maaf, anda tidak dapat masuk kehalaman yang dituju. Silahkan login terlebih dahulu!');
    }
    }

}