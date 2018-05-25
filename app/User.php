<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    public function bidang(){
        return $this->belongsTo('\App\Bidang','id_bidang');
    }

    use Notifiable;

    protected $fillable = [
        'id_users','nama_lengkap','nip','instansi','id_bidang','username', 'password', 'level','status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey = 'id_users';
    protected $table='users';
}
