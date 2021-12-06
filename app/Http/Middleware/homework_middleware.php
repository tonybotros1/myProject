<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class homework_middleware
{

    public function handle(Request $request, Closure $next)
    {
        $error = false;
        if(!$request->hasheader('X-TOKEN'))
        {
            $error = true;
        }
        $token = $request->header('X-TOKEN');
        try{
            $fileContent = file_get_contents('C:\xampp\htdocs\user_credentails.json');
            $jsonContent = json_decode($fileContent,true);

            $jsonStr = base64_decode($token);
            $jsonPayload = json_decode($jsonStr,true);
            if(!$jsonPayload){
                $error = true;

            }
            if(!isset($jsonPayload['email'])){
                $error = true;

            }
            if(!isset($jsonPayload['password'])){
                $error = true;

            }

            if(!in_array($jsonPayload,$jsonContent)){

                $error = true;
            }



        }catch(\Exception $exception)
        {
            $error = true;
        }
        if ($error){
            return response()->json(['message'=>'Invalid token'],401);
        }

        return $next($request);
    }
}
