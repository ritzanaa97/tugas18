<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table='barang';
    protected $primaryKey='id_barang';
    protected $fillable=['id_barang','nama_barang','jumlah','id_jenisbarang','id_satuan','keterangan'];

    public $incrementing = false;

    public function barangmasuk()
    {
        return $this->hasMany('\App\Detailbrgmasuk','id_barang');
    }

    public function barangkeluar()
    {
        return $this->hasMany('\App\Detailbrgkeluar','id_barang');
    }
    
    public function jenisbarang(){
        return $this->belongsTo('\App\Jenisbarang','id_jenisbarang');
    }

    public function satuan(){
        return $this->belongsTo('\App\Satuan','id_satuan');
    }
    
}
