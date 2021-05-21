<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\MemberService;
use App\Services\SekolahService;
use App\Services\UserService;
use App\Services\UserServices;

class MemberManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function asesiPanel(Request $request)
    {
        $page_title = 'Manajemen Data Asesi';
        $daftar_sekolah = SekolahService::getAllSafe()[0];
        return view('pengaturan.member.asesi.index', compact('page_title', 'daftar_sekolah'));
    }

    public function asesorPanel(Request $request)
    {
        $page_title = 'Manajemen Data Asesor';
        $daftar_asesor = \App\Services\UserService::getAllMember('asesor');
        // dd($daftar_asesor);
        return view('pengaturan.member.asesor.index', compact('page_title', 'daftar_asesor'));
    }

    public function manajerJejaring(Request $request)
    {
        # code...
    }

    public function fetchMember(Request $request)
    {
        if($request->ajax()) {
            $tipe = 'asesi';
            $daftar_member = MemberService::getAll($tipe);
            
            $data = (object) [
                "meta" => (object) [
                    "page"  =>  1,
                    "total" =>  count($daftar_member)
                ], 
                "data" => $daftar_member
            ];
            
            return response()->json($data);
        } else 
        abort(404);
    }

    public function fetchAsesor(Request $request)
    {
        if($request->ajax()) {
            $tipe = 'asesor';
            $daftar_member = UserService::getAllMember('asesor');
            // dd($daftar_member);
            $data = (object) [
                "meta" => (object) [
                    "page"  =>  1,
                    "total" =>  count($daftar_member)
                ], 
                "data" => $daftar_member
            ];
            
            return response()->json($data);
        } else 
        abort(404);
    }

    public function exportMember()
    {
        $tipe = 'asesi';
        $daftar_member = MemberService::getAllQB($tipe, false, ['users.email','data_diris.nik', 'data_diris.nama', 'data_diris.jenis_kelamin', 'data_diris.tempat_lahir', 'data_diris.tanggal_lahir', 'data_diris.no_telp','data_diris.domisili_alamat']);
        $daftar_member = $daftar_member->transform(function($it) {
            return (object) [
                "nama"  =>  $it->nama,
                "nik"  =>  $it->nik,
                "tempat_lahir"  =>  $it->tempat_lahir,
                "tanggal_lahir"  =>  date('d/m/Y', strtotime($it->tanggal_lahir)),
                "jenis_kelamin"  =>  $it->jenis_kelamin,
                "domisili_alamat"  =>  $it->domisili_alamat,
                "no_telp"  =>  $it->no_telp,
                "email"  =>  $it->email,
            ];
        });
        return view('pengaturan.member.asesi.preview_export', ["collection" => $daftar_member]);
        // dd($daftar_member);
        // if($request->ajax()) {
        //     $tipe = 'asesi';
        //     $daftar_member = MemberService::getAll($tipe);
            
        //     $data = (object) [
        //         "meta" => (object) [
        //             "page"  =>  1,
        //             "total" =>  count($daftar_member)
        //         ], 
        //         "data" => $daftar_member
        //     ];
            
        //     return response()->json($data);
        // } else 
        // abort(404);
    }

    public function createAsesor()
    {
        $daftar_sekolah = SekolahService::getAll();
        // dd($daftar_sekolah);
        return view('pengaturan.member.asesor.create', compact('daftar_sekolah'));
    }

    public function storeAsesor(Request $request)
    {
        $request->validate([
                "met"    =>  "required|unique:asesors",
                "email" =>  "required|unique:users",
                "password"  =>  "required|min:8",
                "nik"   =>  "required|unique:data_diris",
                "nama"  =>  "required",
                "no_telp"      =>  "required",
                "tanggal_lahir" =>  "required",
                "pendidikan_terakhir"   =>  "required",
                "kewarganegaraan"   =>  "required",
                "pekerjaan_instansi"    =>  "required",
                "pekerjaan_jabatan" =>  "required",
                "pekerjaan_alamat"  =>  "required",
                "pekerjaan_telp"    =>  "required",
                "pekerjaan_kode_pos"    =>  "required",
                "ktp_alamat"    =>  "required",
                "ktp_provinsi"  =>  "required",
                "ktp_kota"  =>  "required",
                "ktp_kode_pos"  =>  "required",
                "domisili_alamat"   =>  "required",
                "domisili_provinsi" =>  "required",
                "domisili_kota" => "required" ,
                "domisili_kode_pos" =>  "required"
        ]);

        $memberService = new MemberService;
        try {
            $userCreation = $memberService->createAccount((object) [
                "nama"          => $request->nama,
                "email"         => $request->email,
                "password"      => $request->password,
                "tipe"          => json_encode(["asesor"]),
                ]);
        } catch (\Exception $e) {
            return abort(500, 'Maaf, Terjadi kesalahan pada server');
        }
                
        $role = \Spatie\Permission\Models\Role::findByName("Asesor", "web");
        $userCreation->assignRole($role);
        $data = (object) $request->all();

        try {
            $asesorCreation = $memberService->createAsesor($userCreation->id,  $data);
        } catch (\Exception $e) {
            return abort(500, 'Maaf, Terjadi kesalahan pada server gagal membuat data asesor');
        }
        
        
        $dataDiri = $memberService->fillDataDiri($userCreation->id, $data);
        

        return redirect(route("pengaturan.member.asesor"))->with("success","Tambah Asesor Berhasil");
    }

    public function deleteAsesor(Request $request)
    {
        // dd($request->all());
        $memberService = new MemberService;
        $member = $memberService->getMemberById($request->unique);
        $deleteAsesorData = $memberService->deleteAsesorDataByUserId($member->id);
        $deleteDataDiriData = $memberService->deleteDataDiriByUserId($member->id);
        $deleteUser = $member->delete();

        // dd([$deleteAsesorData, $deleteDataDiriData, $member]);
        

        return redirect(route("pengaturan.member.manager.index"))->with("success","Hapus Manager Berhasil");
    }

    public function editAsesor(Request $request, $uid)
    {
        if($uid == null) return abort(404);
        $data_member = MemberService::getOne($uid, 'asesor');
        $daftar_sekolah = SekolahService::getAll(['id', 'uid', 'nama']);        
        $page_title = "Edit Data Asesor";        

        return view('pengaturan.member.asesor.edit', compact('page_title', 'data_member','daftar_sekolah'));

    }

    public function updateAccountAsesor(Request $request, $uid)
    {
        $request->validate([
            "met"    =>  "required",
            "email" =>  "required",
            "lsp_induk"     =>  "required"
        ]);

        if(isset($request->password)) {
            if($request->password != $request->password_confirmation)  {
                return redirect()
                            ->back()
                            ->withInput($request->input())
                            ->withErrors(['password_confirmation' => "Password Confirmation harus benar"]);
            }
        }

        $dataUpdate = (object) [
            "met"       =>  $request->met, 
            "lsp_induk" =>  $request->lsp_induk           
        ];

        $memberService = new MemberService;
        $user = $memberService->getOne($uid, 'asesor');

        if(isset($request->password)) {
            $memberService->updateAccount($uid, (object) ["password" => $request->password]);
        }

        $updateAccount = $memberService->updateDataAsesor($user->id, $dataUpdate);

        return redirect()->back()->with('success', 'Data Akun berhasil diubah');
    }

    public function updateProfileAsesor(Request $request, $uid)
    {
        $request->validate([
            "nik"   =>  "required",
            "nama"  =>  "required",
            "no_telp"      =>  "required",
            "tanggal_lahir" =>  "required",
            "pendidikan_terakhir"   =>  "required",
            "kewarganegaraan"   =>  "required",
            "pekerjaan_instansi"    =>  "required",
            "pekerjaan_jabatan" =>  "required",
            "pekerjaan_alamat"  =>  "required",
            "pekerjaan_telp"    =>  "required",
            "pekerjaan_kode_pos"    =>  "required",
            "ktp_alamat"    =>  "required",
            "ktp_provinsi"  =>  "required",
            "ktp_kota"  =>  "required",
            "ktp_kode_pos"  =>  "required",
            "domisili_alamat"   =>  "required",
            "domisili_provinsi" =>  "required",
            "domisili_kota" => "required" ,
            "domisili_kode_pos" =>  "required"
        ]);

        $memberService = new MemberService;
        $user = $memberService->getOne($uid, 'asesor');

        $user = $memberService->updateDataDiri($user->id, (object) $request->all());
        
        
        return redirect()->back()->with('success', 'Data Profil berhasil disimpan');
    }

    public function createAsesi()
    {
        return view('pengaturan.member.asesi.create');
    }

    public function editAsesi(Request $request)
    {
        $request->validate([
            'q' =>  'uuid'
        ]);
        $data_member = MemberService::getOne($request->q);
        $page_title = "Edit Data Asesi";

        return view('pengaturan.member.asesi.edit', compact('page_title', 'data_member'));

    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            "unique"    =>  'required|uuid',
            "password"  =>  "required|min:8|max:16|confirmed"            
        ]);

        $user = MemberService::getOne($request->unique);

        $user->password = Hash::make($request->password, [
            'memory' => 1024,
            'time'  => 2,
            'threads' => 2
        ]);

        $user->save();

        return redirect(route('pengaturan.member.asesi.edit').'?q='.$user->uid)->with('success', 'Role barhasil ditambahkan');;
    }

    // ======= MANAGER SECTION ================================================ 
    public function managerPanel()
    {
        $page_title = 'Manajemen Data Asesi';
        $daftar_mgr = MemberService::getAll('manajer');
        // dd($daftar_mgr);
        return view('pengaturan.member.manajer.index', compact('page_title', 'daftar_mgr'));
    }

    public function fetchManager(Request $request)
    {
        if($request->ajax()) {
            $daftar_member = MemberService::getAll('manajer');
            
            $data = (object) [
                "meta" => (object) [
                    "page"  =>  1,
                    "total" =>  count($daftar_member)
                ], 
                "data" => $daftar_member
            ];
            
            return response()->json($data);
        } else 
        abort(404);
    }

    public function createManager()
    {
        $page_title = "Tambah Data Manager";
        return view('pengaturan.member.manajer.create', compact('page_title'));
    }

    public function storeManager(Request $request)
    {
        $request->validate([
            "nama"      =>  "required",
            "email"     =>  "required",
            "telp"      =>  "required",
            "password"  =>  "required|min:8",
        ]);

        $memberService = new MemberService;
        $userCreation = $memberService->createAccount((object) [
            "nama"          => $request->nama,
            "email"         => $request->email,
            "password"      => $request->password,
            "tipe"          => json_encode(["manager"]),
        ]);
        $role = \Spatie\Permission\Models\Role::findByName("Super Manajer", "web");
        $userCreation->assignRole($role);

        return redirect(route("pengaturan.member.manager.index"))->with("success","Tambah Manager Berhasil");
    }

    public function editManager ($uid)
    {
        $page_title = "Edit Data Manager";
        $mgr = MemberService::getOne($uid, 'manajer');

        return view('pengaturan.member.manajer.edit', compact('page_title', 'mgr'));
    }

    public function updateManager(Request $request, $uid)
    {
        $request->validate([
            "nama"      =>  "required",
            "email"     =>  "required",
            "telp"      =>  "required",
            "password"  =>  "nullable|min:8",
        ]);
        // dd($request->all());
        $memberService = new MemberService;
        $userCreation = $memberService->updateAccount($uid, (object) [
            "nama"          => $request->nama,
            "email"         => $request->email,
            "password"      => $request->password,
            "tipe"          => json_encode(["manager"]),
        ]);
        
        return redirect(route("pengaturan.member.manager.edit", ["uid"=> $uid]))->with("success","Tambah Manager Berhasil");
    }

    public function deleteManager($uid)
    {
        $memberService = new MemberService;
        $delete = $memberService->deleteMember($uid);

        return redirect(route("pengaturan.member.manager.index"))->with("success","Hapus Manager Berhasil");
    }
}
