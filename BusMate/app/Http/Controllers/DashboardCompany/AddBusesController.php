<?php

namespace App\Http\Controllers\DashboardCompany;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\company;
use Illuminate\Http\Request;

class AddBusesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bus = Bus::get();
        return view('DashboardCompany.Buses.showbuses')->with('buses', $bus);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DashboardCompany.Buses.AddBuses')->with('company', company::latest('company_id')->first());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'bus_number' => ['required', 'integer'],
                'bus_type' => ['required', 'in:large,medium,small'],
                'bus_sign' => ['required', 'integer'],
                'capacity' => ['required', 'integer'],
                'company_id' => ['required']
            ]
        );

        $subscriber = $request->except(['_token']);


        $store = Bus::create($subscriber);
        return redirect()->route('AddBuses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            return view('DashboardCompany.Buses.onebus')->with('bus', Bus::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'bus not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {

            return view('DashboardCompany.Buses.edit_bus')->with('edit_bus', Bus::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Bus not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'bus_number' => ['required', 'integer'],
                'bus_type' => ['required', 'in:large,medium,small'],
                'bus_sign' => ['required', 'integer'],
                'capacity' => ['required', 'integer'],
                'company_id' => ['required']
            ]
        );
        try {
            $subscriber = Bus::findOrFail($id);
            $subscriber->update($request->except(['_token']));
            return redirect()->route('AddBuses.index');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Buse not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $subscriber = Bus::findOrFail($id);
            $subscriber->delete();
            return redirect()->route('AddBuses.index');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Subscriber not found');
        }
    }
}
