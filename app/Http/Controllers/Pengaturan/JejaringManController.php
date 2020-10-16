<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class JejaringManController extends Controller
{
    public function index()
    {
        $daftar_sekolah = Sekolah::all();
        $page_title = "Pengaturan Sekolah & Jejaring";
        return view('pengaturan.jejaring.sekolah.index', compact('page_title','daftar_sekolah'));
    }
}
