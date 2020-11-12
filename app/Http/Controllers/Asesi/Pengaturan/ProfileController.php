<?php

namespace App\Http\Controllers\Asesi\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MemberService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $page_title = "Profil Member";
        $data_diri = Auth::user()->dataDiri;
        $data_asesi = Auth::user()->asesi;
        return view('asesi.pengaturan.profil', compact('page_title','data_diri','data_asesi'));
    }

    public function actionUpdate(Request $request)
    {
        $userID = Auth::user()->id;
        $data = (object) $request->all();
        $memberService = new MemberService();
        $request->validate([            
            "nama"  =>  'required',
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
        
        $data->jenis_kelamin = isset($data->jenis_kelamin) && $data->jenis_kelamin == "on" ? "L" : "P";

        // checking if the user has profile 
        if(Auth::user()->dataDiri == null) {
            $request->validate([
                "nik"   =>  'required|unique:data_diris|max:16|min:16']);
            $dataDiri = $memberService->fillDataDiri($userID, $data);
            $data->tipe = "induk";
            $dataAsesi = $memberService->createAsesi($userID, $data);
            
        } else {
            $dataDiri = $memberService->updateDataDiri($userID, $data);            
        }
        
        return response()->json(["status"=>"success"],200);
        // dd([$dataUser, $dataUser->dataDiri, $dataUser->asesi ]);
    }

    public function showResetPassword()
    {
        $page_title = "Update Password";
        return view('asesi.pengaturan.change-password', compact('page_title'));
    }

    public function actionResetPassword(Request $request)
    {
        $request->validate([
            "password"  =>  "required|min:8|max:16|confirmed"            
        ]);


        $user = Auth::user();

        $user->password = Hash::make($request->password, [
            'memory' => 1024,
            'time'  => 2,
            'threads' => 2
        ]);        

        $user->pwd_exp_date = date('Y-m-d', strtotime('+365 days'));

        $user->save();

        return response()->json(['status'=>'success'], 200);
    }
}
