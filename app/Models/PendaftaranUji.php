<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranUji extends Model
{
    protected $primaryKey = null;
    public $incrementing = false;

    public function ujiKompetensi()
    {
        return $this->belongsTo('App\Models\UjiKompetensi', 'uji_kompetensi_id');
    }
}
