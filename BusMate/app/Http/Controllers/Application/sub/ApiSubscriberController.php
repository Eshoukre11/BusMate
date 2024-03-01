<?php

namespace App\Http\Controllers\Application\sub;

use App\Models\trip;
use App\Models\subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\GeneralTrait;
use App\Models\change_trip_request;
use App\Models\Driver;
use App\Models\driver_feedback;
use App\Models\feedback;
use App\Models\subscriber_feedback;
use App\Models\subscriber_trip;

class ApiSubscriberController extends Controller
{
    use GeneralTrait;

    ///////////////////////////////////logout/////////////////////////////////////////////
    public function Logout(Request $request)
    {

        $token = $request->header('auth_token');
        if ($token) {
            try {
                Auth::setToken($token)->invalidate(); // invalidate the token.
            } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                return $this->returnError('eror01', 'something rong');
            }
            return $this->returnSuccessMessage('Logged out successfully', '200');
        } else {
            return $this->returnError('404', 'you should login firstly');
        }
    }


    //////////////////////show all trip for subscriber//////////////////////////////////////////  
    public function ShowTrip()
    {

        $trip = trip::get();
        return $this->returnData('trips', $trip, 'This all trip');
    }




    ///////////////////////////////// subscriber chose a trip/////////////////////////////////// 
    public function choosetrip(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'subscriber_id' => 'required|exists:subscribers,subscriber_id',
                'trip_id' => 'required|exists:trips,trip_id',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->returnError($e->status, $e->validator->errors()->first());
        }

        try {
            $trip = trip::findOrFail($request->input('trip_id'));
            $subscriber = subscriber::findOrFail($request->input('subscriber_id'));
            $qrcode = 'trip_number' . ':' . $trip['trip_number'] . ',' . 'subscriber_type' . ':' . $subscriber['subscriber_type'] . ',' . 'full_name' . ':' . $subscriber['full_name'] . ',' . 'subscriber_state' . ':' . $subscriber['subscriber_state'];
            $trips = $request->only('subscriber_id', 'trip_id');

            $trips['QrCode'] = $qrcode;
            $sub_trip = subscriber_trip::create($trips);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {


            return $this->returnError('T01', 'trip not found');
        }
        return $this->returnSuccessMessage('chose trip successfuly', '200');
    }



    //////////////////////////////////show subscriber trip///////////////////////////////
    public function showsubscribertrip(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'subscriber_id' => 'required|exists:subscribers,subscriber_id',

            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->returnError($e->status, $e->validator->errors()->first());
        }

        $subscriber_trip = subscriber_trip::where('subscriber_id', $request->input('subscriber_id'))->get();
        foreach ($subscriber_trip as  $trip) {

            $trip_info = trip::findOrFail($trip['trip_id']);
            $trip['trip_id'] = [
                'trip_number' => $trip_info->trip_number,
                'trip_type' => $trip_info->trip_type,
                'trip_day' => $trip_info->trip_day,
            ];
        }
        if ($subscriber_trip->count() > 0) {
            return $this->returnData('trips', $subscriber_trip, 'This your All trip');
        } else return $this->returnError('404', "There is no trips for you ");
    }


    ////////////////////////////changetriprequest////////////////////////////////////////////
    public function changetriprequest(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'subscriber_id' => ['required', 'exists:subscribers,subscriber_id'],
                'old_trip_number' => ['required', 'exists:trips,trip_number'],
                'new_trip_number' => ['required', 'exists:trips,trip_number'],

            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->returnError($e->status, $e->validator->errors()->first());
        }
        $ChangeTripRequest = $request->only('subscriber_id', 'old_trip_number', 'new_trip_number');
        change_trip_request::create($ChangeTripRequest);
        return $this->returnSuccessMessage("Your request has been sent");
    }

    /////////////////////////////send feedback///////////////////////////////////////////////
    public function SendFeedback(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => ['required', 'alpha'],
                'contant' => ['required', 'string', 'max:255'],
                'type' => ['required', 'in:complaint,suggestion'],
                'state' => ['required', 'in:read,unread'],
                'subscriber_type' => ['required', 'in:driver,staff,student'],
                'sender_id' => ['required']
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->returnError($e->status, $e->validator->errors()->first());
        }

        //create feedbaack record 
        $feedback = $request->only('title', 'contant', 'type', 'state');
        $feedbacks = feedback::create($feedback);


        try {
            //create feedback  for driver
            if ($request->input('subscriber_type') == 'driver') {

                $driver_feedback['feedback_id'] = $feedbacks->feedback_id;

                $driver_feedback['driver_id'] = $request->input('sender_id');
                $d = driver_feedback::create($driver_feedback);

                return $this->returnSuccessMessage('Send feedback successfuly');
            }
            //create feedback for subscriber 
            else if ($request->input('subscriber_type') == 'student' or $request->input('subscriber_type') == 'staff') {
                $subscriber_feedback['feedback_id'] = $feedbacks->feedback_id;
                $subscriber_feedback['subscriber_id'] = $request->input('sender_id');
                $s = subscriber_feedback::create($subscriber_feedback);
                return $this->returnSuccessMessage('Send feedback successfuly');
            } else return $this->returnError("404", 'send failed ');
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }
    }
}
