<?php

namespace App\Services;

use App\Models\UjiKompetensi;
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
        $dataUjiKompetensi = UjiKompetensi::where('uid',$uid)->firstOrFail();

        return $dataUjiKompetensi;
    }
}
