<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dtl_pengajuanbarang extends Model
{
    protected $table='detailpengajuanbrg'; //nama tabel di database
    protected $primaryKey='id_detailpengajuanbrg';
    protected $fillable=['id_detailpengajuanbrg','id_barang','jumlahpengajuan','id_pengajuanbrg','id_detailbrgkeluar','status'];

    public $incrementing = false;

    public function barang()
    {
        return $this->hasMany('\App\Barang','id_barang');
    }
}
