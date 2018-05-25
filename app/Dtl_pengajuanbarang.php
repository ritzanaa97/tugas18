<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dtl_pengajuanbarang extends Model
{
    protected $table='dtl_pengajuanbarang'; //nama tabel di database
    protected $primaryKey='dtl_pengajuanbarang';
    protected $fillable=['dtl_pengajuanbarang','id_barang','jumlah','id_pengajuanbarang'];

    public $incrementing = false;

    public function barang()
    {
        return $this->hasMany('\App\Barang','id_barang');
    }
}
