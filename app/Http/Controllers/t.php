<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class t extends Controller
{
    public function index (Request $request) {
        $path = $request->file('t')->path();
        dd($path);
    }
}
