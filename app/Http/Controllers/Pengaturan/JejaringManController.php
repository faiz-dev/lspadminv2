<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Service\SekolahService;
use Illuminate\Http\Request;

class JejaringManController extends Controller
{
    public function index()
    {
        $daftar_sekolah = SekolahService::getAllSafe();                
        $page_title = "Pengaturan Sekolah & Jejaring";
        return view('pengaturan.jejaring.sekolah.index', compact('page_title','daftar_sekolah'));
    }
}
