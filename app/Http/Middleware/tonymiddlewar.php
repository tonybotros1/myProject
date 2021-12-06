<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class tonymiddlewar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $error = false;


        if(!$request->hasheader('X-TOKEN'))
        {
            $error = true;
        }
        $token = $request->header('X-TOKEN');
        $productId = $request -> route('productId');
        return $productId;
        try{
            $fileContent = file_get_contents('C:\xampp\htdocs\products_list.json');
            $jsonContent = json_decode($fileContent,true);

            $jsonStr = base64_decode($token);
            $jsonPayload = json_decode($jsonStr,true);
            if(!$jsonPayload){
                $error = true;

            }
            if(!isset($jsonPayload['email'])){

                $error = true;

            }
            // if(!isset($jsonPayload['password'])){
            //     $error = true;

            // }

            // if(!in_array($jsonPayload,$jsonContent)){

            //     $error = true;
            // }
            if($jsonContent[$productId - 1]['owner_email'] != $jsonPayload['email']){
                //echo $jsonPayload['email'];

                $error = true;
            }
            return $jsonContent[$productId - 1]['owner_email'];


        }catch(\Exception $exception)
        {
            $error = true;
        }
        if ($error){
            return response()->json(['message'=>'You are not the owner'],401);
        }
        return $jsonContent[$productId - 1]['owner_email'];


        return $next($request,$productId);
    }
}
