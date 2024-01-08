<?php

namespace App\Http\Controllers\university;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function ShowLogin()
    {
        return view('university.login.login');
    }

    public function CheckLogin(Request $login)
    {
        $login->validate([
            "email" => ["required", "email"],
            "password" => ["required", "min:6"],
        ]);
        if (Auth::guard('university')
            ->attempt(['email' => $login->email, 'password' => $login->password])
        ) {
            return redirect()->route('university.dashboard');
        } else {
            return redirect()->back()
                ->with('error_login', 'these credentials false ');
        }
    }
}
