<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function welcome()
    {
        return view('welcome-mobile');
    }

    public function index()
    {
        return view('mobile.index');
    }
}
