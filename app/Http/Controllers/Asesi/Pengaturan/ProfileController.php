<?php

namespace App\Http\Controllers\Asesi\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $page_title = "Profil Member";
        return view('asesi.pengaturan.profil', compact('page_title'));
    }

    public function actionUpdate(Request $request)
    {
        dd($request->all());
    }
}
