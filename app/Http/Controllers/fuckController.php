<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fuckController extends Controller
{
    public function firstfirst (){
        return view('first_page');
    }


    public function secondsecond(){
        return view('second_page');

    }
}
