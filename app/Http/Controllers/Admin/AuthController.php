<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function loginDo(LoginRequest $request)
    {
        $validData = $request->validated();

        if (auth('admin')->attempt($validData)) {
            return route('admin.dashboard');
        } else {
            return back()->withErrors('Username or password is invalid');
        }
    }

    public function logout()
    {
        if (auth('admin')->logout()) {
            return route('admin.login');
        } else {
            return back()->withErrors('Logout failed !');
        }
    }

    public function forgerPassword()
    {

    }
}
