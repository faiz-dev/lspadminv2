<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UjiKompetensi extends Model
{
    public function skema()
    {
        return $this->belongsTo('App\Models\Skema');
    }
}
