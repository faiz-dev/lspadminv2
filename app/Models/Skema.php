<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    public function skemaInduk()
    {
        return $this->belongsTo('App\Models\Skema', 'parent_id');
    }
}
