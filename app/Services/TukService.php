<?php

namespace App\Services;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TukService 
{
    public static function getAll($select = [])
    {
        $select = $select == [] ? ["tuks.uid as tuk_uid",
                                "tuks.sekolah_id",
                                "tuks.nama",
                                "tuks.jenis",
                                "tuks.telp",
                                "tuks.alamat",
                                "tuks.provinsi",
                                "tuks.kota",
                                "tuks.kode_pos", 
                                'sekolahs.nama as skl_nama'] : $select;
        return DB::table('tuks')
            ->select($select)
            ->leftJoin('sekolahs', 'tuks.sekolah_id', 'sekolahs.id')
            ->get();
    }

    public static function getOneByUID($uid, $select = [])
    {
        $select = $select == [] ? ["tuks.uid as tuk_uid",
                                "tuks.sekolah_id",
                                "tuks.nama",
                                "tuks.jenis",
                                "tuks.telp",
                                "tuks.alamat",
                                "tuks.provinsi",
                                "tuks.kota",
                                "tuks.kode_pos", 
                                'sekolahs.nama as skl_nama'] : $select;
        $tuk = DB::table('tuks')
            ->select($select)
            ->where('tuks.uid', $uid)
            ->leftJoin('sekolahs', 'tuks.sekolah_id', 'sekolahs.id')
            ->first();

        if($tuk == null) abort(404);
        return $tuk;
    }

    public static function create($data)
    {
        try {
            $tuk = new \App\Models\TUK;
            $tuk->uid           = Str::uuid();
            $tuk->sekolah_id    = $data->sekolah_id;
            $tuk->nama          = $data->nama;
            $tuk->jenis         = $data->jenis;
            $tuk->telp          = $data->telp;
            $tuk->alamat        = $data->alamat;
            $tuk->provinsi      = $data->provinsi;
            $tuk->kota          = $data->kota;
            $tuk->kode_pos      = $data->kode_pos;

            $tuk->save();

            return $tuk;
        } catch(Exception $e) {
            abort(500, $e);
        }

    }

    public static function update($uid, $data)
    {
        try {
            $tuk = \App\Models\TUK::where('uid', $uid)->firstOrFail();
            $tuk->sekolah_id    = $data->sekolah_id;
            $tuk->nama          = $data->nama;
            $tuk->jenis         = $data->jenis;
            $tuk->telp          = $data->telp;
            $tuk->alamat        = $data->alamat;
            $tuk->provinsi      = $data->provinsi;
            $tuk->kota          = $data->kota;
            $tuk->kode_pos      = $data->kode_pos;

            $tuk->save();

            return $tuk;
        } catch(Exception $e) {
            abort(500, $e);
        }
    }
}
