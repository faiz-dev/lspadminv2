<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class UserService
{
    public static function getAllMember($type = '', $select = ['u.*'])
    {
        $select = $select;

        $member = DB::table('users as u');

        switch($type) {
            case 'asesi' : break;
            case 'asesor' : 
                $select = [...$select, 'asesor.uid as asesor_uid', 'asesor.met', 'asesor.lsp_induk', 'asesor.kewarganegaraan', 
                            'sekolahs.nama as lsp_induk_nama',
                            'diri.nama as nama_lengkap',
                            'diri.gelar_depan as gelar_depan',
                            'diri.gelar_belakang as gelar_belakang',
                        ];
                $member = $member->whereJsonContains('tipe','asesor')
                                ->where('u.deleted_at', null)
                                ->leftJoin('asesors as asesor', 'u.id', 'asesor.user_id')
                                ->leftJoin('data_diris as diri', 'u.id', 'diri.user_id')
                                ->leftJoin('sekolahs', 'sekolahs.id', 'asesor.lsp_induk');
                break;
            case 'manager' : break;
            case 'manager_jejaring' : break;
            default: 
                return $member->get();
            break;
        }
        

        $member = $member->select($select)->get();

        return $member;
    }
}
