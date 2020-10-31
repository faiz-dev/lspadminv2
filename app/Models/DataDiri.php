<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataDiri extends Model
{
    use SoftDeletes;

    // get nama lengkap beserta gelar depan dan belakangnya
    public function getNamaLengkapAttribute($value): string
    {
        $nama_lengkap = $this->nama;
        if($this->gelar_depan != "") {
            $nama_lengkap = $this->gelar_depan +' ' + $nama_lengkap;
        }

        if($this->gelar_belakang != "") {
            $nama_lengkap = $nama_lengkap + ' ' + $this->gelar_belakang;
        }
        
        return $nama_lengkap;
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User','id');
    }
}
