<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuanbarang extends Model
{
    protected $table='pengajuanbarang';
    protected $primaryKey='id_pengajuanbarang';
    protected $fillable=['id_pengajuanbarang','id_bidang','tanggal_pengajuan'];

    public $incrementing = false;//ketika id berupa varchar

    public function pengajuanbarang()
    {
        return $this->hasMany('id_pengajuanbarang');
    }
    public function bidang()
    {
        return $this->belongsTo('\App\Bidang','id_bidang');
    }

}
