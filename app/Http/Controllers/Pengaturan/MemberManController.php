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
            $memberService = new MemberService();
            $daftar_member = $memberService->getAll($tipe);
            
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
