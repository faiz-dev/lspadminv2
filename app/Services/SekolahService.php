<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Sekolah;

class SekolahService 
{
    public static function getAllSafe(): Collection
    {
        $daftar_sekolah = Sekolah::all();

        return $daftar_sekolah->transform(function($item) {
            return (object) $item->only(["uid","nama","alamat","kota","provinsi","no_telp","email"]);
        });
    }

    public static function getOne($uid): Sekolah
    {
        $sekolah = Sekolah::where('uid', $uid)->first();

        return $sekolah;
    }
}
