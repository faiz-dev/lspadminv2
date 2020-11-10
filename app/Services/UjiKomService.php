<?php

namespace App\Services;

use App\Models\{UjiKompetensi, PendaftaranUji};
use Illuminate\Database\Eloquent\Collection;

class UjiKomService 
{
    public static function getAllSafe($isActive = true): Collection
    {
        $daftar_ujikom = UjiKompetensi::with('skema')->where('isActive', $isActive)->get();
        $daftar_ujikom->transform(function($item) {
            $item = (object) $item->only(['uid','nama','tgl_awal','tgl_akhir','jml_asesi','deskripsi','skema']);
            
            $dataSkema = (object) [
                "uid"   =>  $item->uid,
                "nama" => $item->skema->nama,
                "kode" => $item->skema->kode,
                "kode" => $item->skema->kode,
                "level_kkni" => $item->skema->level_kkni,
                "judul_klaster" => $item->skema->judul_klaster,
            ];

            if($item->skema->parent_id != null) {
                $dataSkema->nama_skema_induk = $item->skema->skemaInduk->nama;
                $dataSkema->kode_skema_induk = $item->skema->skemaInduk->kode;
            }

            $item->skema = $dataSkema;
            return $item;
        });
        return $daftar_ujikom;
    }

    public static function getOne($uid): UjiKompetensi
    {
        $dataUjiKompetensi = UjiKompetensi::where('uid',$uid)
                                        ->with('skema.skemaInduk')
                                        ->firstOrFail();

        return $dataUjiKompetensi;
    }

    public static function createPendaftaran($uid, $userdata, $data): PendaftaranUji
    {
        $dataUjiKompetensi = UjiKompetensi::where('uid',$uid)->firstOrFail();
        
        $pendaftaran = new PendaftaranUji;
        $pendaftaran->user_id = $userdata->id;
        $pendaftaran->uji_kompetensi_id = $dataUjiKompetensi->id;
        

        $profile = (object) [
            "nik"                   =>  $userdata->datadiri->nik,
            "nama"                  =>  $data->nama,
            "tempat_lahir"          =>  $data->tempat_lahir,
            "tgl_lahir"             =>  $data->tgl_lahir,
            "jenis_kelamin"         =>  $data->jenis_kelamin,
            "pendidikan"            =>  $data->pendidikan,
            "kewarganegaraan"       =>  $data->kewarganegaraan,
            "alamat"                =>  $data->alamat,
            "kota"                  =>  $data->kota,
            "kode_pos"              =>  $data->kode_pos,
            "no_telp"               =>  $data->no_telp,
            "pekerjaan_instansi"    =>  $data->pekerjaan_instansi,
            "pekerjaan_jabatan"     =>  $data->pekerjaan_jabatan,
            "pekerjaan_alamat"      =>  $data->pekerjaan_alamat,
            "pekerjaan_kode_pos"    =>  $data->pekerjaan_kode_pos,
            "pekerjaan_telp"        =>  $data->pekerjaan_telp,
            "email"                 =>  $userdata->email
        ];

        $pendaftaran->dump_profile = json_encode($profile);

        $skema = (object) [
            "nama"  =>  $dataUjiKompetensi->skema->nama,
            "kode"  =>  $dataUjiKompetensi->skema->kode,
            "level_kkni"    =>  $dataUjiKompetensi->skema->level_kkni,
            "judul_klaster" =>  $dataUjiKompetensi->skema->judul_klaster
        ];

        $unit_kompetensi = $dataUjiKompetensi
                            ->skema
                            ->unitKompetensi
                            ->transform(function($uk) {
                                return (object) [
                                    "kode"  =>  $uk->kode,
                                    "judul" =>  $uk->judul,
                                    "jenis_standar" =>  $uk->jenis_standar
                                ];
                            });
        $skema->unit_kompetensi = $unit_kompetensi;
        $pendaftaran->dump_skema = json_encode($skema);

        $pendaftaran->tujuan_sertifikasi  = $data->tujuan_sertifikasi;
        $pendaftaran->catatan = '';
        $pendaftaran->disetujui = false;

        $pendaftaran->save();        

        return $pendaftaran;
    }

    public static function getPendaftaranByUser($user_id): Collection
    {
        $daftar_pendaftaran = PendaftaranUji::where('user_id', $user_id)->with('ujiKompetensi')->get();

        $daftar_pendaftaran->transform(function($p) {
            $p->dump_skema = json_decode($p->dump_skema);
            $p->dump_profile = json_decode($p->dump_profile);
            return $p;
        });
        return $daftar_pendaftaran;
    }

    public static function countPendaftaranActiveByUser($user_id): int
    {
        $ct_pendaftaran = PendaftaranUji::where('user_id', $user_id)->whereRaw("status = 'revisi' OR status = 'review'")->count();

        return $ct_pendaftaran;
    }

    public static function getPendaftaranOne($user_id, $ukom_id)
    {
        $pendaftaran = PendaftaranUji::where('user_id',$user_id)->where('uji_kompetensi_id',$ukom_id)->first();

        return $pendaftaran;
    }
}