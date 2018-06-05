<?php

namespace App\Models\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'nip';
    protected $table='users';
    protected $fillable = ['nip','nama_lengkap','id_bidang', 'password', 'level','status'];
    protected $hidden = ['password', 'remember_token'];
    public $incrementing = false;//ketika id berupa varchar

    public function bidang()
    {
        return $this->belongsTo('\App\Bidang','id_bidang');
    }

    use Notifiable;


}
