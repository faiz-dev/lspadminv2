<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManajerJejaring extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function sekolah()
    {
        return $this->belongsTo('App\Models\Sekolah', 'sekolah_id');
    }
}
