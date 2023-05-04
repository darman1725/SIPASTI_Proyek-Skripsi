<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Information\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nik' => 'required|string|unique:users,nik',
            'email' => 'required|string|email|unique:users,email',
            'nama_lengkap' => 'required|string',
            'username' => 'nullable|string',
            'password' => 'required|string|min:6',
            'level' => 'nullable|string|in:user,admin',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'nik' => $data['nik'],
            'email' => $data['email'],
            'nama_lengkap' => $data['nama_lengkap'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'level' => 'user'
        ]);
    }

    protected function redirectTo()
    {
    return '/menu/dashboard_user';
    }
}