<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use App\User;

class AuthKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $validator = Validator::make($request->all(), [
//            'api_token' => 'exist'
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json($validator->messages()->first());
//        }
        $cek = User::query()
            ->select('api_token')
            ->where('api_token', $request->header('APP_KEY'))
            ->first();
//        $token = $request->header('APP_KEY');
        if ($cek === false) {
            return response()->json([
                'message' => 'login first or invalid login token'
            ], 401);
        }
        return $next($request);
    }
}
