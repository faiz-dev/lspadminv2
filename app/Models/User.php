<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dataDiri()
    {
        return $this->hasOne('App\Models\DataDiri');
    }

    public function asesi()
    {
        return $this->hasOne('App\Models\Asesi');
    }

    public function asesor()
    {
        return $this->hasOne('App\Models\Asesor');
    }

    public function manajer()
    {
        return $this->hasOne('App\Models\Manajer');
    }

    public function manajerJejaring()
    {
        return $this->hasOne('App\Models\ManajerJejaring');
    }

    public function pendaftaran()
    {
        return $this->hasMany('App\Models\Pendaftaran','user_id');
    }
}
