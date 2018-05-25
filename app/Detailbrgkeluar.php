<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailbrgkeluar extends Model
{
    protected $table='detailbrgkeluar';
    protected $primaryKey='id_detailbrgkeluar';
    protected $fillable=['id_detailbrgkeluar','id_barang','id_brgkeluar','jumlah'];

    public $incrementing = false;

    public function barang()
    {
        return $this->belongsTo('\App\Barang','id_barang');
    }

    public function barangkeluar()
    {
        return $this->belongsTo('\App\Barang_keluar','id_brgkeluar');
    }
}
