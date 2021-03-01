<?php

namespace App\Services;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TukService 
{
    public static function getAll($select = [])
    {
        $select = $select == [] ? ["tuks.uid as tuk_uid","sekolah_id","nama","jenis","telp","alamat","provinsi","kota","kode_pos", 'sekolah.nama as skl_nama'] : $select;
        return DB::table('tuks')
            ->select($select)
            ->leftJoin('sekolahs', 'tuks.sekolah_id', 'sekolahs.id')
            ->get();
    }
}
