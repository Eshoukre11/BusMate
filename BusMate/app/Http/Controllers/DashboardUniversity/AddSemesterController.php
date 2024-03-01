<?php

namespace App\Http\Controllers\DashboardUniversity;

use App\Models\year;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class AddSemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semesters = Semester::get();
        return view('DashboardUniversity.semester.show_semester')->with('semesters', $semesters);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('DashboardUniversity.semester.add_semester')->with('year', year::latest('year_date')->first());
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'you can not add semester  without year');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'semester_name' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'semester_code' => ['required', 'alpha_num', 'unique:semesters,semester_code'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'year_id' => ['required']

        ]);

        $semester = $request->except(["_token"]);


        Semester::create($semester);

        return redirect()->route('Add_Semester.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            return view('DashboardUniversity.Subscriber.subscriber')->with('semester', Semester::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'company not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {

            return view('DashboardUniversity.semester.editsemester')->with('editsemester', Semester::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Semester not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'semester_name' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'semester_code' => ['required', 'alpha_num'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],

        ]);
        try {

            $semester = Semester::findOrFail($id);
            $semester->update($request->except(["_token"]));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Semester not found');
        }
        return redirect()->route('Add_Semester.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $semester = Semester::findOrFail($id);
            $semester->delete();
            return redirect()->route('Add_Semester.index');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Semester not found');
        }
    }
}
