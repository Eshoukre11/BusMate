<?php

namespace App\Http\Traits;

use Tymon\JWTAuth\Facades\JWTAuth;

trait GeneralTrait
{

    public function getCurrentLang()
    {
        return app()->getLocale();
    }

    public function returnError($errNum, $msg)
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }


    public function returnSuccessMessage($msg = "", $succNum = "200")
    {
        return [
            'status' => true,
            'sucNum' => $succNum,
            'msg' => $msg
        ];
    }

    public function returnData($key, $value, $msg = "", $succNum = "200")
    {
        return response()->json([
            'status' => true,
            'sucNum' => $succNum,
            'msg' => $msg,
            $key => $value
        ]);
    }
}
