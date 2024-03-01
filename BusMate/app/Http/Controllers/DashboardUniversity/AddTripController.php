<?php

namespace App\Http\Controllers\DashboardUniversity;

use App\Models\stop;
use App\Models\trip;
use App\Models\trip_stop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Semester;

class AddTripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trip = trip::get();
        return view('DashboardUniversity.Trip.showtrip')->with('trip', $trip);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DashboardUniversity.Trip.addtrip')
            ->with('semester', Semester::latest()->first());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'trip_number' => ['required', 'integer', 'unique:trips,trip_number'],
                'trip_type' => ['required', 'in:go,return,special'],
                'start_point' => ['required', 'string'],
                'end_point' => ['required', 'string'],
                'trip_day' => ['required', 'string'],
                'start_time' => ['required'],
                'stops' => ['required', 'string'],
                'semester_id' => ['required', 'exists:semesters,semester_id']

            ]
        );
        //create Trip record
        trip::create($request->only(["trip_number", "trip_type", "start_point", "end_point", "trip_day", "start_time", "stops", "semester_id"]));
        return redirect()->route('Add_Trip.index');
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

            return view('DashboardUniversity.Trip.edittrip')->with('edittrip', trip::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Trip not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate(
            [
                'trip_number' => ['required', 'integer'],
                'trip_type' => ['required', 'in:go,return,special'],
                'start_point' => ['required', 'string'],
                'end_point' => ['required', 'string'],
                'trip_day' => ['required', 'string'],
                'start_time' => ['required'],
                'stops' => ['required', 'string'],
                'semester_id' => ['required'],

            ]
        );

        try {
            $trip = trip::findOrFail($id);

            $trip->update($request->only(["trip_number", "trip_type", "start_point", "end_point", "trip_day", "start_time", "semester_id"]));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return redirect()->back()->with('error', 'trip not found');
        }

        //-----------------------------------------------
        return redirect()->route('Add_Trip.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $trip = trip::findOrFail($id);
            $trip->delete();
            return redirect()->route('Add_Trip.index');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Trip not found to delet');
        }
    }
}
