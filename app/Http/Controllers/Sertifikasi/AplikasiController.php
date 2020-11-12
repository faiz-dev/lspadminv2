<?php

namespace App\Http\Controllers\Sertifikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\{
    UjiKomService,
    SekolahService
};

class AplikasiController extends Controller
{
    public function index(Request $request)
    {
        // sekolah
        $daftar_sekolah = SekolahService::getAllSafe();        
                
        $page_title = "Aplikasi Uji Kompetensi";
        return view('sertifikasi.aplikasi.index', compact('page_title','daftar_sekolah'));
    }

    public function data(Request $request)
    {
        $filter = (object) [];
        $options = (object) [
            "complete"  =>  false
        ];

        $request->validate([
            'status'        =>  "required|in:semua,review,revisi,ditolak,disetujui",
            'ujikom'        =>  "required|uuid"
        ]);
        // set filter
        $filter->status = $request->status;
        $filter->uji_kom_uid = $request->ujikom;
        
        $daftar_pendaftaran = UjiKomService::getAllPendaftaranSafe($filter, $options);

        $data = (object) [
            "meta" => (object) [
                "page"  =>  1,
                "total" =>  count($daftar_pendaftaran)
            ], 
            "data" => $daftar_pendaftaran
        ];
        return response()->json($data);
    }

    /**
     * Fungsi untuk melihat detail pendaftaran
     * parameter: ?q=uid uji kompetensi
     */
    public function detail(Request $request)
    {
        # code...
    } 

    /**
     * Fungsi untuk mengubah data pendaftaran:
     *  Mengubah menjadi revisi dengan memberi catatan
     *  Mengubah menjadi ditolak dengan memmberi catatan
     *  Mengubah menjadi diterima dengan memberi catatan dan jadwal uji kompetensi
     * parameter: ?q=uid uji kompetensi
     */
    public function updateStatus(Request $request)
    {
        return response()->json(["status" => "success", "req"=> $request->all()], 200);
        $request->validate([
            'user_id'   =>  'required|exists:user',
            'ujikom_id' =>  'required|exists:uji_kompetensis',
            'status'    =>  'required|in:review,revisi,ditolak,disetujui',
            'catatan'   =>  'required'
        ]);
        $options = (object) $request->only('user_id','ujikom_id','status');
        $pendaftaran = UjiKomService::updateStatusPendaftaran($options);
    } 

    /**
     * Fungsi untuk menghapus data pendaftaran (soft delete):
     * parameter: ?q=uid uji kompetensi
     */
    public function delete(Request $request)
    {
        # code...
    } 
}
