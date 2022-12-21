<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TestController extends Controller
{

    public function index() {
       
        return redirect() -> route('home.');
    }
    public function test() {
        return view('clients.test'); 
    }

    public function ajax(Request $request) {
        $request -> all(); 
        print_r($request->all()); 

    }
}
