<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('portal.index');
    }

    public function contactus()
    {
        return view('portal.contactus');
    }

    public function download()
    {
        return view('portal.download');
    }
}
