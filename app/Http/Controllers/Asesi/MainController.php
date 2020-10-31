<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Services\UjiKomService;
use App\Services\MemberService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome()
    {
        $page_title = 'Dashboard';
        $data_diri = Auth::user()->dataDiri;
        $daftar_uji = UjiKomService::getAllSafe();
        $ct_pendaftaran = UjiKomService::countPendaftaranActiveByUser(Auth::user()->id);
        return view('asesi.welcome', compact('page_title', 'daftar_uji', 'ct_pendaftaran'));
    }
}
