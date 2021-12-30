<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test1(Request $request){

        return $request->session()->forget('email');
    }

    public function test2(){
        return "xu ly session";
    
    }
}