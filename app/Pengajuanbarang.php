<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuanbarang extends Model
{
    protected $table='pengajuanbarang';
    protected $primaryKey='id_pengajuanbrg';
    protected $fillable=['id_pengajuanbrg','nip_mengajukan','tanggal_pengajuan','nip_serah','tanggal_serah','status_pengajuan'];

    public $incrementing = false;//ketika id berupa varchar

    public function pengajuanbarang()
    {
        return $this->hasMany('id_pengajuanbrg');
    }
    public function users()
    {
        return $this->belongsTo('\App\User','nip');
    }

}
