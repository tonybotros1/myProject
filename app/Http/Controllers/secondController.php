<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class secondController extends Controller
{
    public function checkUser() {
       //$name = request()->query('user_name');
       //if(!isset($name)){
       //    return response()->json([
       //        'message'=> 'You have to fill user parameters llllllllllllllllllll',
       //    ]);
       //}

       //$fileContent = file_get_contents("http://localhost/json1.json");
       //$jsonContent =(array) json_decode($fileContent,true);

       //$str1 = implode(",",$jsonContent);
       //echo(strtoupper($str1));
       //
       //if(!in_array($name,$jsonContent)){
       //    return response()->json([
       //        'message'=>sprintf('%s is invild supplied name',$name)
       //    ]);
       //}

       //return response()->json([
       //    'message'=>'Welcome',
       //    
       //]);



        $email = request()->query('user_email');
        dd($email);
        if(!isset($email)){
            return response()->json([
                'message'=>'you have to fill user parameters',
            ]);
        }
        $fileContent = file_get_contents("http://localhost/json_file.json");
        $jsonContent = (array)json_decode($fileContent,true);
        if(!in_array($email,$jsonContent)){
            return response()->json([
                'message'=>sprintf('%s is invild supplied name',$email)
            ]);
        }
        return response()->json([
            'message'=>'welcome',
        ]);

}
}
