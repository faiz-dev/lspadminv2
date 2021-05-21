<?php

namespace App\Services;

use Illuminate\SUpport\Facades\DB;

class SkemaService
{
    public static function getAll($select = [], $isParent = null)
    {        
        $select = $select == [] ? [
                    "id",
                    "uid",
                    "nama",
                    "kode",
                    "level_kkni",
                    "judul_klaster",
                    "parent_id"
        ] : $select;

        $data = DB::table("skemas")
            ->select($select);
        
        if($isParent === null) {
            $data = $data->where('parent_id', null);
        } else {
            if($isParent === false) {
                $data = $data->whereNotNull('parent_id');
            } else {
                $data = $data->where('parent_id', $isParent);
            }
        } 
            

        return $data->get();
    }

    public static function getOne($uid, $select = [])
    {
        $select = $select == [] ? [
            "id",
            "uid",
            "nama",
            "kode",
            "level_kkni",
            "judul_klaster",
            "parent_id"
        ] : $select;
        $skema = \App\Models\Skema::where('uid', $uid)
                                ->with('subSkema','skemaInduk')
                                ->first();
        return $skema;
    }
}
