<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class AsesorUtils extends Controller
{
    public function getSafe(Request $request)
    {
        $filter = (object) [
            "isActive"  =>  true
        ];
        $options = (object) [
            "complete"  =>   false
        ]; 

        $daftar_asesor = UserService::getAllMember('asesor', ["u.uid", "asesor.met"]);
        // dd($daftar_asesor);

        return response()->json(["status" => "success", "daftar_ujikom" => $daftar_asesor]);
    }
}
