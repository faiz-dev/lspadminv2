<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{

    public function subSkema()
    {
        return $this->hasMany('App\Models\Skema', 'parent_id');
    }

    public function skemaInduk()
    {
        return $this->belongsTo('App\Models\Skema', 'parent_id');
    }

    public function unitKompetensi()
    {
        return $this->belongsToMany('App\Models\UnitKompetensi','unit_skemas','skema_id','unit_kompetensi_id');
    }
}
