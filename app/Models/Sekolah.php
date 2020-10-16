<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    public function manajerJejaring()
    {
        return $this->hasMany('App\Models\ManajerJejaring','sekolah_id');
    }
}
