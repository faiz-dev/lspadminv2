<?php

namespace App\Http\Controllers\Sertifikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UjiKomService;

class RencanaSertifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar_sekolah = \App\Services\SekolahService::getAll();

        
        $daftar_ujikom = UjiKomService::getAllAdvancedV2();
        // dd($daftar_ujikom);
        return view('sertifikasi.perencanaan.mcert.index',[
            'page_title'        => "Manajemen Rencana Sertifikasi",
            'daftar_ujikom'     => $daftar_ujikom,
            'daftar_sekolah'    => $daftar_sekolah,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftar_sekolah = \App\Services\SekolahService::getAll();
        $daftar_tuk = \App\Services\TukService::getAll(['tuks.uid', 'tuks.sekolah_id', 'tuks.nama']);
        $daftar_skema = \App\Services\SkemaService::getAll(['uid', 'nama', 'judul_klaster'], true);
        $daftar_asesor = \App\Services\MemberService::getAll('asesor');

        // dd([$daftar_tuk, $daftar_skema, $daftar_asesor]);

        return view('sertifikasi.perencanaan.mcert.create',[
            'page_title'        => "Tambah Rencana Sertifikasi",
            'daftar_tuk'        => $daftar_tuk,
            'daftar_skema'      => $daftar_skema,
            'daftar_asesor'     => $daftar_asesor,
            'daftar_sekolah'    => $daftar_sekolah,
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
