<?php

namespace App\Http\Controllers\Asesi\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\MemberService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $page_title = "Profil Member";
        return view('asesi.pengaturan.profil', compact('page_title'));
    }

    public function actionUpdate(Request $request)
    {
        $userID = Auth::user()->id;
        $data = (object) $request->all();
        $memberService = new MemberService();
        $request->validate([
            "nik"   =>  'required|unique:data_diris|max:16|min:16',
            "nama"  =>  'required',
            "jenis_kelamin" =>  'required',
            "tempat_lahir"  =>  'required',
            "tanggal_lahir" =>  'required',
            "no_telp"   =>  'required',
            "pekerjaan_instansi"    =>  'required',
            "pekerjaan_jabatan" =>  'required',
            "pekerjaan_alamat"  =>  'required',
            "pekerjaan_telp"    =>  'required',
            "pekerjaan_kode_pos"    =>  'required',
            "domisili_alamat"   =>  'required',
            "domisili_provinsi" =>  'required',
            "domisili_kota" =>  'required',
            "domisili_kode_pos" =>  'required',
            "ktp_alamat"    =>  'required',
            "ktp_provinsi"  =>  'required',
            "ktp_kota"  =>  'required',
            "ktp_kode_pos"  =>  'required',
            ]);

        $dataDiri = $memberService->fillDataDiri($userID, $data);
        $data->tipe = "induk";
        $dataAsesi = $memberService->createAsesi($userID, $data);
        $dataUser = Auth::user();
        dd([$dataUser, $dataUser->dataDiri, $dataUser->asesi ]);
    }
}
