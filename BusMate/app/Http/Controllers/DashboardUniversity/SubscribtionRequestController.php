<?php

namespace App\Http\Controllers\DashboardUniversity;

use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\subscription_request;
use Illuminate\Support\Facades\Hash;
use App\Models\subscriber;

class SubscribtionRequestController extends Controller
{
    /**
     * Display a listing of the subscriber request type name .
     */
    public function index()
    {
        $request = subscription_request::get();
        return view('DashboardUniversity.SubscriberRequest.subscriberrequest')->with('request', $request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'subscriber_type' => ['required'],
                'full_name' => ['required', 'regex:/^[\pL\s\-]+$/u'],
                'college' => ['required', 'regex:/^[\pL\s\-]+$/u'],
                'college_number' => ['required', 'numeric'],
                'phone' => ['required', 'regex:/^09\d{8}$/'],
                'email' => ['required', 'email'],
                'password' => ['required'],
                'semester_id' => ['required'],
            ]
        );

        $subscriber = $request->except(['_token']);
        $store = subscriber::create($subscriber);
        $store->update(['subscriber_state' => 'active']);
        return redirect()->route('Subscriber.index');
    }

    /**
     * Display the specified request in add subscriber form page.
     */
    public function show(string $id)
    {
        try {

            return view('DashboardUniversity.SubscriberRequest.Addsubscriber')->with('request', subscription_request::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'subscriber Request not found');
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
        try {
            $subscriber_re = subscription_request::findOrFail($id);
            $subscriber_re->delete();
            return redirect()->route('SubscribtionRequest.index');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Subscriber not found');
        }
    }
}
