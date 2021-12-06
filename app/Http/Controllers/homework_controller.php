<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homework_controller extends Controller
{
    public function homework_check(Request $request){

        // $email = request()->input('email');
        // $password = request()->input('password');

        // if(!$email || !$password)
        // {
        //     return response()->json([
        //         'message'=>'You need to fill all infos !!!'
        //     ]);
        // }




        return response()->json([
            'message'=>'success'
        ]);

    }
}
