<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("university.dashboard.Add.show_student", ['student' => student::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('university.dashboard.Add.add_student');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            "name" => ["required", "regex:/^[a-zA-Z ]+$/"],
            "colleg_number" => ["required", "numeric"],
            "email" => ["required", "email"],
            "phone_number" => ["required", "numeric"],
            "password" => ["required", "min:6"],
            "colleg" => ["required", "regex:/^[a-zA-Z ]+$/"],

        ]);
        $student = new student();
        $student->name = strip_tags($request->name);
        $student->email = strip_tags($request->email);
        $student->phone_number = strip_tags($request->input('phone_number'));
        $student->college = strip_tags($request->colleg);
        $student->college_number = strip_tags($request->input('colleg_number'));
        $student->password = strip_tags($request->password);
        $student['password'] = Hash::make($request->password);
        $student->sub_status = true;
        $student->save();
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $student_id)
    {
        // return view('university.dashboard.Add.edit_student', ['student_id' => student::findOrFail($student_id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
