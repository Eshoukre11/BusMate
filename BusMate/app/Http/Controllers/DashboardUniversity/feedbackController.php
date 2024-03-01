<?php

namespace App\Http\Controllers\DashboardUniversity;

use App\Http\Controllers\Controller;
use App\Models\driver_feedback;
use App\Models\feedback;
use App\Models\subscriber_feedback;
use Illuminate\Http\Request;

class feedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subfeedback = subscriber_feedback::get();
        $drivfeedback = driver_feedback::get();
        return view('DashboardUniversity.feedback.subscribtionfeedback')
            ->with('subscriberfeedback', $subfeedback)->with('drivfeedback', $drivfeedback);
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
        try {

            return view('DashboardUniversity.feedback.feedback')->with('feedback', feedback::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Subscriber not found');
        }
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
