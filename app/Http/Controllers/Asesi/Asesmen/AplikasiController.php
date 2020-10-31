<?php

namespace App\Http\Controllers\Asesi\Asesmen;

use App\Http\Controllers\Controller;
use App\Services\UjiKomService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
     * FUNCTION UNTUK MELIHAT DAFTAR PENDAFTARAN UJI KOMPETENSI
     * route: /member/ujikom/pendaftaran/uuid
     * */ 
    public function listPendaftaran(Request $request)
    {
        $daftar_pendaftaran = UjiKomService::getPendaftaranByUser(Auth::user()->id);
        $page_title = 'Daftar Pengajuan Pendaftaran';
        // dd($daftar_pendaftaran);
        return view('asesi.asesmen.aplikasi.index', compact('page_title','daftar_pendaftaran'));
    }

    /** 
     * FUNCTION UNTUK MELAKUKAN PENDAFTARAN UJI KOMPETENSI
     * route: /member/ujikom/pendaftaran/uuid
     * */ 
    public function pendaftaran(Request $request)
    {
        $data_ujikom = UjiKomService::getOne($request->q);

        if(UjiKomService::getPendaftaranOne(Auth::user()->id, $data_ujikom->id) != null) {
            return redirect(route('asesi.asesmen.show-pendaftaran').'?q='.$request->q);
        }

        $page_title = "Pendaftaran Uji Kompetensi";
        $data_diri = Auth::user()->dataDiri;
        $data_skema = $data_ujikom->skema;        
        // dd($data_ujikom);
        return view('asesi.asesmen.aplikasi.pendaftaran', compact('page_title', 'data_ujikom', 'data_diri', 'data_skema'));
    }

    public function actionPendaftaran(Request $request)
    {
        $request->validate([
            "nama"                  =>  "required",
            "tempat_lahir"          =>  "required",
            "tgl_lahir"             =>  "required|date",
            "jenis_kelamin"         =>  "required|in:l,p",
            "pendidikan"            =>  "required",
            "kewarganegaraan"       =>  "required",
            "alamat"                =>  "required",
            "kota"                  =>  "required",
            "kode_pos"              =>  "required",
            "no_telp"               =>  "required",            
            "pekerjaan_instansi"    =>  "required",
            "pekerjaan_jabatan"     =>  "required",
            "pekerjaan_alamat"      =>  "required",
            "pekerjaan_kode_pos"    =>  "required",
            "pekerjaan_telp"        =>  "required",
            "tujuan_sertifikasi"    =>  "required|in:sertifikasi-baru,sertifikasi-ulang",
            "persetujuan_syarat"    =>  "required|in:on",
            "konfirmasi_akhir"      =>  "required|in:on",
        ]);

        $data = (object) $request->all();
        $userdata = Auth::user();        
        $pendaftaran = UjiKomService::createPendaftaran($request->q, $userdata, $data);
        

        return response()->json([
                'status'=>'success', 
                "redirect_target" => route('asesi.asesmen.show-pendaftaran').'?q='.$request->q
            ], 200);
    }


    public function showPendaftaran(Request $request)
    {
        $data_ujikom = UjiKomService::getOne($request->q);
        $data_pendaftaran = UjiKomService::getPendaftaranOne(Auth::user()->id, $data_ujikom->id);
        $page_title = 'Detail Pendaftaran';
        return view('asesi.asesmen.aplikasi.index', compact('page_title','data_ujikom','data_pendaftaran'));
    }
    
}
