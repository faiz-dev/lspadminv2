<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Services\UjiKomService;
use App\Services\SekolahService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UjiKomUtils extends Controller
{
    public function getSafe(Request $request)
    {
        $filter = (object) [
            "isActive"  =>  true
        ];
        $options = (object) [
            "complete"  =>   false
        ];

        if(Auth::user()->hasRole(['Super Manajer'])) {
            // filter sekolah
            if(isset($request->sid) && Str::isUuid($request->sid)) {
                $sekolah = SekolahService::getOne($request->sid);
                $filter->sekolah = $sekolah->id;
            }                        
        } else if(Auth::user()->hasRole(['Manajer Jejaring'])) {
            $sekolah_id = Auth::user()->manajerJejaring->sekolah->id;
            $filter->sekolah = $sekolah_id;
        }

        $daftar_ujikom = UjiKomService::getAllAdvanced($filter, $options);

        return response()->json(["status" => "success", "daftar_ujikom" => $daftar_ujikom]);
    }
}
