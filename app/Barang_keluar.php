<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang_keluar extends Model
{
    protected $table='barangkeluar';
    protected $primaryKey='id_brgkeluar';
    protected $fillable=['id_brgkeluar','id_bidang','tanggal_keluar'];

    public $incrementing = false;

    public function barangkeluar()
    {
        return $this->hasMany('\App\Detailbrgkeluar','id_brgkeluar');
    }

    public function bidang()
    {
        return $this->belongsTo('\App\Users','id_bidang');
    }
}
