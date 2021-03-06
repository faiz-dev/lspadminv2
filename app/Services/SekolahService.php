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
            $is = (object) $item->only(['id',"uid","nama","alamat","kota","provinsi","no_telp","email"]);
            $is->jurusan = $item->jurusan;
            return $is;
        });
    }

    public static function getAll($select = [])
    {
        $select = $select == [] ? ['uid', 'nama', 'kota'] : $select;
        
        return $sekolah = DB::table('sekolahs')->select($select)->get();
    }

    public static function getOnebyUid($uid, $select = [])
    {
        $select = $select = [] ? ['uid', 'nama'] : $select;
        return DB::table('sekolahs')->where('uid', $uid)->first();

    }

    public static function getOne($uid): Sekolah
    {
        $sekolah = Sekolah::where('uid', $uid)->first();

        return $sekolah;
    }
}
