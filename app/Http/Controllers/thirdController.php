<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class thirdController extends Controller
{
    public function check(Request $request){
       
        return response()->json([
            'message'=>'success'
        ]);

    }
}
