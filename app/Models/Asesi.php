<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asesi extends Model
{
    use SoftDeletes;

    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    
}
