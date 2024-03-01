<?php

namespace App\Http\Controllers\DashboardCompany;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Driver;
use Illuminate\Http\Request;

class AddDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $driver = Driver::get();
        return view('DashboardCompany.Drivers.showdriver')->with('driver', $driver);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DashboardCompany.Drivers.Adddriver')->with('buses', Bus::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [

                'driver_name' => ['required', 'regex:/^[\pL\s\-]+$/u'],
                'driver_address' => ['required', 'string'],
                'driver_number' => ['required', 'regex:/^09\d{8}$/'],
                'email' => ['required', 'email'],
                'password' => ['required'],
                'license_number' => ['required', 'integer'],
                'date_of_employment' => ['required', 'date'],
                'bus_id' => ['required'],
            ]
        );

        $subscriber = $request->except(['_token']);
        $subscriber['subscriber_type'] = 'driver';
        $store = Driver::create($subscriber);
        return redirect()->route('AddDriver.index');
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

            return view('DashboardCompany.Drivers.edit_driver')->with('edit_driver', Driver::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'driver not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate(
            [

                'subscriber_type' => ['required', 'in:driver'],
                'driver_name' => ['required', 'regex:/^[\pL\s\-]+$/u'],
                'driver_address' => ['required', 'string'],
                'driver_number' => ['required', 'regex:/^09\d{8}$/'],
                'email' => ['required', 'email'],
                'password' => ['required'],
                'license_number' => ['required', 'integer'],
                'date_of_employment' => ['required', 'date'],
                'bus_id' => ['required'],
            ]
        );
        $driver = Driver::findOrFail($id);
        $driver->update($request->except(['_token']));
        return redirect()->route('AddDriver.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $subscriber = Driver::findOrFail($id);
            $subscriber->delete();
            return redirect()->route('AddDriver.index');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'driver not found');
        }
    }
}
