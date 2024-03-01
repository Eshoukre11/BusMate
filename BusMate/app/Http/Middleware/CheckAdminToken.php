<?php

namespace App\Http\Middleware;

use App\Http\Traits\GeneralTrait;
use Closure;
use Exception;
use Throwable;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class CheckAdminToken
{

    use GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = null;
        try {
            $user = JWTAuth::parseToken()->authenticate();
            //throw an exception

        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return $this->returnError('CH01', 'INVALID _TOKEN');
            } else if ($e instanceof TokenExpiredException) {
                return response()->json(['success' => false, 'msg' => 'EXPIRED_TOKEN']);
                return $this->returnError('CH02', 'EXPIRED_TOKEN');
            } else {

                return $this->returnError('CH03', 'Error');
            }
        } catch (Throwable $e) {
            if ($e instanceof TokenInvalidException) {
                return $this->returnError('CH01', 'INVALID _TOKEN');
            } else if ($e instanceof TokenExpiredException) {
                return $this->returnError('CH02', 'EXPIRED_TOKEN');
            } else {

                return $this->returnError('CH03', 'Error');
            }
        }
        if (!$user) {
            return $this->returnError('CH03', trans('unauthenticate'));
        }
        return $next($request);
    }
}

// return $next($request);