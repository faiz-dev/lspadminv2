<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\MemberService;
use App\Services\SekolahService;

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
        # code...
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
