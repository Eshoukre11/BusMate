<?php

namespace App\Http\Controllers\DashboardUniversity;

use App\Models\year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AddYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $years = year::get();
        return view('year')->with('years', $years);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Addyear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $adminKey = env('ADMIN_KEY');
        if ($request->adminKey == $adminKey) {

            $request->validate([
                'year_date' => ['required', 'date_format:Y', 'unique:years,year_date'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date', 'after:start_date']
            ]);

            $year = $request->except(["_token", "adminKey"]);
            $year['password'] = Hash::make($year['password']);
            year::create($year);

            return redirect()->route('Add_Year.index');
        } else
            return redirect()->back()->with('error', 'You are not allowed to add users');
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
        try {
            return view('edityear')->with('edityear', year::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Year not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $adminKey = env('ADMIN_KEY');
        if ($request->adminKey == $adminKey) {
            $request->validate([
                'year_date' => ['required', 'date_format:Y'], //test if we add a 'unique:years,year_date'
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date', 'after:start_date']
            ]);
            try {
                $year = year::findOrFail($id);
                $year->update($request->except(["_token", "adminKey"]));
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return redirect()->back()->with('error', 'Year not found');
            }
            return redirect()->route('Add_Year.index');
        } else
            return redirect()->back()->with('error', 'You are not allowed to edit year');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $year = year::findOrFail($id);
            $year->delete();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Year not found');
        }
        return redirect()->route('Add_Year.index');
    }
}
