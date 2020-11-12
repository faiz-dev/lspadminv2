<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UjiKompetensi extends Model
{
    public function skema()
    {
        return $this->belongsTo('App\Models\Skema');
    }

    public function tuk()
    {
        return $this->belongsTo('App\Models\Tuk','tuk_id');
    }
}
