<?php

namespace App\Http\Controllers\Sertifikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UjiKomService;

class PenjadwalanUjkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sertifikasi = UjiKomService::getOne($request->crt);
        $daftar_asesor = \App\Services\UserService::getAllMember('asesor');

        return view('sertifikasi.perencanaan.jadwal-ujk.create', [
            "page_title"    =>  'Penjadwalan UJK untuk Sertifikasi',
            "sertifikasi"   =>  $sertifikasi,
            'daftar_asesor' =>  $daftar_asesor
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
        $request->validate([
            'asesor'   =>   'required|exists:users,uid',
            'tanggal'  =>   'required|date'
        ]);

        $insertJadwal = UjiKomService::createJadwal($request->crt, $request->asesor, $request->tanggal);

        // dd($insertJadwal)
        if($insertJadwal) {
            return redirect(route("mcert.show", ["mcert" => $request->crt]))->with('success', 'Berhasil Menambahkan Jadwal');
        } else {
            return redirect()->back()->withInput($request->input())->withErrors(['error' => "Gagal Menambahkan Jadwal"]);
        }
        
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
