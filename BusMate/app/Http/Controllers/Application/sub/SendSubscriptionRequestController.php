<?php

namespace App\Http\Controllers\Application\sub;

use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\Models\subscription_request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class SendSubscriptionRequestController extends Controller
{
    use GeneralTrait;


    //////////////////////////send request subscription////////////////////////////////////
    public function SendSubscribtionRequest(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'subscriber_type' => ['required'],
                'full_name' => ['required', 'regex:/^[\pL\s\-]+$/u'],
                'college' => ['required', 'alpha_dash'],
                'college_number' => ['required', 'numeric'],
                'phone' => ['required', 'regex:/^09\d{8}$/'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:6', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*()_+!])[A-Za-z\d@#$%^&*()_+!]+$/'],

            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->returnError($e->status, $e->validator->errors()->first());
        }
        $sub_request = $request->all();
        $sub_request['password'] = Hash::make($sub_request['password']);
        $latest_semester = Semester::latest('semester_id')->first();
        $sub_request["semester_id"] = $latest_semester->semester_id;
        subscription_request::create($sub_request);
        return $this->returnSuccessMessage('تم ارسال الطلب بنجاح ');
    }


    ////////////////////////////login///////////////////////////////
    public function Login(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:6', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*()_+!])[A-Za-z\d@#$%^&*()_+!]+$/'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->returnError($e->status, $e->validator->errors()->first());
        }
        ////////////

        $credentials = $request->only('email', 'password');

        $token = Auth::guard('subscriber-api')->attempt($credentials);
        if ($token == true) {
            $subscriber = Auth::guard('subscriber-api')->user();
            $subscriber['Token'] = $token;
            return $this->returnData('Subscriber', $subscriber, 'this is your data ');
        }
        $token2 = Auth::guard('driver-api')->attempt($credentials);
        if ($token2 == true) {
            $subscriber2 = Auth::guard('driver-api')->user();
            $subscriber2['Token'] = $token2;
            return $this->returnData('Subscriber', $subscriber2, 'this is your data ');
        }

        return $this->returnError('422', 'بيانات التسجيل غير صحيحة');
    }
}
    // تابع Login
    /*
    public function Login2(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:6', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*()_+!])[A-Za-z\d@#$%^&*()_+!]+$/'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->returnError($e->status, $e->validator->errors()->first());
        }

        $credentials = $request->only('email', 'password');

        // استخدم Auth::attempt بدلا من Auth::guard
        $token = Auth::attempt($credentials, 'subscriber-api');
        if ($token == true) {
            // استخدم Auth::user بدلا من Auth::guard
            $subscriber = Auth::user('subscriber-api');
            // استخدم response()->json بدلا من $this->returnData
            return response()->json([
                'status' => 'success',
                'data' => [
                    'type' => 'Subscriber',
                    'user' => $subscriber,
                    'token' => $token
                ],
                'message' => 'this is your data'
            ]);
        }
        // استخدم Auth::attempt بدلا من Auth::guard
        $token2 = Auth::attempt($credentials, 'driver-api');
        if ($token2 == true) {
            // استخدم Auth::user بدلا من Auth::guard
            $subscriber2 = Auth::user('driver-api');
            // استخدم response()->json بدلا من $this->returnData
            return response()->json([
                'status' => 'success',
                'data' => [
                    'type' => 'Driver',
                    'user' => $subscriber2,
                    'token' => $token2
                ],
                'message' => 'this is your data'
            ]);
        }

        return $this->returnError('422', 'بيانات التسجيل غير صحيحة');
    }
}
*/