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
        $filter = (object) [];
        $options = (object) [
            "complete"  =>  false
        ];

        // sekolah
        $daftar_sekolah = SekolahService::getAllSafe();        

        if($request->ajax()) {
            $request->validate([
                'status'        =>  "required|in:semua,review,revisi,ditolak,disetujui",
                'ujikom'   =>  "required|uuid"
            ]);
            // set filter
            $filter->status = $request->status;
            $filter->uji_kom_uid = $request->ujikom;
            
            $daftar_pendaftaran = UjiKomService::getAllPendaftaranSafe($filter, $options);

            return response()->json(["status"=> "success", "daftar_pendaftaran" => $daftar_pendaftaran]);
        }
        
        $daftar_pendaftaran = UjiKomService::getAllPendaftaranSafe($filter, $options);
        $page_title = "Aplikasi Uji Kompetensi";
        return view('sertifikasi.aplikasi.index', compact('page_title', 'daftar_pendaftaran','daftar_sekolah'));
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
        # code...
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
