<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtsController extends Controller
{
    public function index()
    {
        return view('uts.index'); 
    }
}
