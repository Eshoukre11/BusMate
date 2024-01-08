<?php

namespace App\Http\Controllers\university;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        return view('university.dashboard.dashboard');
    }
    public function addstudent()
    {
        return view('university.dashboard.Add.add_student');
    }
    public function addunstaff()
    {
        return view('university.dashboard.Add.add_un_staff');
    }
}
