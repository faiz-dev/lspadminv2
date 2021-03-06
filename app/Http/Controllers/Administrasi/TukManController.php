<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use App\Services\SekolahService;
use App\Services\TukService;
use Illuminate\Http\Request;

class TukManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Daftar TUK";
        $page_breadcrumbs= [
            [
                "page" =>  url('/manager'),
                "title" =>  'Dashboard'
            ]
        ];
        $daftar_tuk = TukService::getAll(["tuks.uid as tuk_uid", "tuks.nama", "telp", "sekolahs.nama as skl_nama", "jenis"]);
        
        return view('md_administrasi.mg_tuk.index', [
            'page_title'        =>  $page_title,
            'page_breadcrumbs'  =>  $page_breadcrumbs,
            'daftar_tuk'        =>  $daftar_tuk
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Tambah TUK Baru";
        $page_breadcrumbs= [
            [
                "page" =>  route('mg-tuk.index'),
                "title" =>  'Daftar TUK'
            ],
            [
                "page" =>  url('/manager'),
                "title" =>  'Dashboard'
            ]
        ];
        $daftar_sekolah = SekolahService::getAllSafe();
        return view('md_administrasi.mg_tuk.create', [
            'page_title'        =>  $page_title,
            'page_breadcrumbs'  =>  $page_breadcrumbs,
            'daftar_sekolah'    =>  $daftar_sekolah
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "nama"      => "required",
            "telp"      => "required",
            "jenis"     => "required|in:sewaktu,tetap",
            "alamat"    => "required",
            "kota"      => "required",
            "provinsi"  => "required",
            "kode_pos"  => "required",
            "induk"     => "required|uuid"
        ]);
        $sekolah = SekolahService::getOne($request->induk);
        $data = (object)    $request->all();
        $data->sekolah_id = $sekolah->id;
        $tuk = TukService::create($data);

        return redirect(route('mg-tuk.index'))->with("success", "Tambah TUK Berhasil");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tuk = TukService::getOneByUID($id);
        $page_title = "Tambah TUK Baru";
        $page_breadcrumbs= [
            [
                "page" =>  route('mg-tuk.index'),
                "title" =>  'Daftar TUK'
            ],
            [
                "page" =>  url('/manager'),
                "title" =>  'Dashboard'
            ]
        ];
        $daftar_sekolah = SekolahService::getAllSafe();
        return view('md_administrasi.mg_tuk.edit', [
            'page_title'        =>  $page_title,
            'page_breadcrumbs'  =>  $page_breadcrumbs,
            'tuk'               =>  $tuk,
            'daftar_sekolah'    =>  $daftar_sekolah
        ]);
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
        // dd($request->all());
        $request->validate([
            "nama"      => "required",
            "telp"      => "required",
            "jenis"     => "required|in:sewaktu,tetap",
            "alamat"    => "required",
            "kota"      => "required",
            "provinsi"  => "required",
            "kode_pos"  => "required",
            "induk"     => "required|uuid"
        ]);
        $sekolah = SekolahService::getOne($request->induk);
        $data = (object)    $request->all();
        $data->sekolah_id = $sekolah->id;
        $tuk = TukService::update($id, $data);
        // dd($request);
        return redirect(route('mg-tuk.edit', ['mg_tuk'=>$id]))->with("success", "Update TUK Berhasil");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $uid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        $delete = TukService::delete($uid);
        // $delete = false;
        if($delete) {
            return response()->json((object) ['success'=> true]);
        } else {
            return response()->json((object) ['success'=> false]);
        }
    }
}
