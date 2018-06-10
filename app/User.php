<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'nip';
    protected $table = 'users';
    protected $fillable = ['nip','nama_lengkap','id_bidang', 'password', 'level'];
    protected $hidden = ['password', 'remember_token'];
    public $incrementing = false;//ketika id berupa varchar

    public function bidang()
    {
        return $this->belongsTo('\App\Bidang','id_bidang');
    }




}
