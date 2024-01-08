<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\university_staff;
use Illuminate\Support\Facades\Hash;

class unstaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("university.dashboard.Add.show_un_staff", ['unstaff' => university_staff::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('university.dashboard.Add.add_un_staff');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            "name" => ["required", "regex:/^[a-zA-Z ]+$/"],

            "email" => ["required", "email"],
            "phone_number" => ["required", "numeric"],
            "password" => ["required", "min:6"],
            "colleg" => ["required", "regex:/^[a-zA-Z ]+$/"],

        ]);
        $unstaff = new university_staff();
        $unstaff->name = strip_tags($request->name);
        $unstaff->email = strip_tags($request->email);
        $unstaff->phone_number = strip_tags($request->input('phone_number'));
        $unstaff->college = strip_tags($request->colleg);
        $unstaff->password = strip_tags($request->password);
        $unstaff['password'] = Hash::make($request->password);
        $unstaff->sub_status = true;
        $unstaff->save();
        return redirect()->route('unstaff.index');
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
    public function edit(string $id)
    {
        //
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
