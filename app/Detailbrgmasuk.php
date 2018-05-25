<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailbrgmasuk extends Model
{
    protected $table='detailbrgmasuk';
    protected $primaryKey='id_detailbrgmasuk';
    protected $fillable=['id_detailbrgmasuk','id_barang','id_brgmasuk','jumlah'];

    public $incrementing = false;

    public function barang()
    {
        return $this->belongsTo('\App\Barang','id_barang');
    }
    
    public function barangmasuk()
    {
        return $this->belongsTo('\App\Barang_masuk','id_brgmasuk');
    }

}
