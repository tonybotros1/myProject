<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class forthController extends Controller
{
    public function checkUser() {
        $name = request()->query('user_name');
        if(!isset($name)){
            return response()->json([
                'message'=> 'You have to fill user parameters',
            ]);
        }

        $fileContent = file_get_contents("http://localhost/json1.json");
        $jsonContent = json_decode($fileContent,true);
        if(!in_array($name,$jsonContent)){
            return response()->json([
                'message'=>sprintf('%s is invild supplied name',$name)
            ]);
        }

        return response()->json([
            'message'=>'Welcome',
        ]);
}
}
