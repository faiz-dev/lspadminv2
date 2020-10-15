<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome()
    {
        $page_title = 'Dashboard';
        $dataDiri = Auth::user()->dataDiri;        
        return view('asesi.welcome', compact('page_title'));
    }
}
