<?php

namespace App\Http\Controllers\university;

use App\Models\universitie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function ShowRegister()
    {
        return view('university.Register.Register');
    }

    public function CheckRegister(Request $register)
    {
        $Registe_key = "Regiter1";
        if ($register->Registeration_Key == $Registe_key) {
            $register->validate([
                "universities_name" => ["required", "string", "alpha"],
                "name" => ["required", "string", "alpha"],
                "email" => ["required", "email"],
                "password" => ["required", "min:6"],
            ]);
            $data = $register->except(['Registeration_Key', '_token']);
            $data['password'] = Hash::make($register->password);
            universitie::create($data);
            return redirect()->route('login');
        } else {
            return redirect()->back()->with('erore_register', 'the Registe_key is false');
        }
    }
}
