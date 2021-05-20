<?php

namespace App\Services;

use Illuminate\SUpport\Facades\DB;

class SkemaService
{
    public static function getAll($select = [], $isParent = false)
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
        
        if($isParent) {
            $data = $data->where('parent_id', null);
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
                                ->firstOrFail();
        return $skema;
    }
}
