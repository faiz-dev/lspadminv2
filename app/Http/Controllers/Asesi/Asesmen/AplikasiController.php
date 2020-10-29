<?php

namespace App\Http\Controllers\Asesi\Asesmen;

use App\Http\Controllers\Controller;
use App\Services\UjiKomService;
use Illuminate\Http\Request;

class AplikasiController extends Controller
{
    /** 
     * FUNCTION UNTUK MELIHAT DAFTAR SELURUH UJI KOMPETENSI YANG TERSEDIA
     * route: /member/ujikom
     * */ 

    public function index()
    {
        # code...
    }

    /** 
     * FUNCTION UNTUK MELAKUKAN PENDAFTARAN UJI KOMPETENSI
     * route: /member/ujikom/pendaftaran/uuid
     * */ 
    public function pendaftaran(Request $request)
    {
        // dd($request->all());
        dd(UjiKomService::getOne($request->q));
    }
    
}
