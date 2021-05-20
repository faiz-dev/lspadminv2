<?php

namespace App\Services;

use App\Models\UnitKompetensi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UnitKompetensiService
{
    public static function getAll($select = [])
    {        
        $select = $select == [] ? [
                    "id",
                    "uid",
                    "kode",
                    "judul",
                    "jenis_standar",
        ] : $select;

        $data = DB::table("unit_kompetensis")
            ->select($select)
            ->get();

        return $data;
    }

    public static function getOne($uid, $select = [])
    {
        
        $select = $select == [] ? [            
           "uid",
           "kode",
           "judul",
           "jenis_standar",
        ] : $select;
        $unit = DB::table('unit_kompetensis')
                    ->select($select)
                    ->where('uid', $uid)
                    ->first();
        return $unit;
    }

    public static function create($data)
    {
        $insert = DB::table('unit_kompetensis')
                    ->insert([
                        'uid'           =>  Str::uuid(),
                        'kode'          =>  $data->kode,
                        'judul'         =>  $data->judul,
                        'jenis_standar' =>  $data->jenis_standar,
                    ]);
        return $insert;
    }

    public static function update($data, $uid)
    {
        $insert = DB::table('unit_kompetensis')
                    ->where('uid', $uid)
                    ->update([                        
                        'kode'          =>  $data->kode,
                        'judul'         =>  $data->judul,
                        'jenis_standar' =>  $data->jenis_standar,
                    ]);
        return $insert;
    }

    public static function delete($uid)
    {
        $unit = DB::table('unit_kompetensis')
                    ->where('uid', $uid)
                    ->first();
        if($unit) {
            return DB::table('unit_kompetensis')
                    ->where('uid', $uid)
                    ->delete();
        } else {
            abort(500);
        }
    }
}
