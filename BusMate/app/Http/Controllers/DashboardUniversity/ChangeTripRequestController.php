<?php

namespace App\Http\Controllers\DashboardUniversity;

use App\Http\Controllers\Controller;
use App\Models\change_trip_request;
use Illuminate\Http\Request;

class ChangeTripRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $change_trip_request = change_trip_request::get();
        return view('DashboardUniversity.Trip.changetriprequest')->with('changeTR', $change_trip_request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        try {
            $changeTR = change_trip_request::findOrFail($id);
            $changeTR->delete();
            return redirect()->route('change_trip_request.index');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Subscriber not found');
        }
    }
}
