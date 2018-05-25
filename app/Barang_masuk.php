<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang_masuk extends Model
{
    protected $table='brgmasuk';
    protected $primaryKey='id_brgmasuk';
    protected $fillable=['id_brgmasuk','id_supplier','tanggal_masuk'];

    public $incrementing = false;

    public function barangmasuk()
    {
        return $this->hasMany('\App\Detailbrgmasuk','id_brgmasuk');
    }

    public function supplier()
    {
        return $this->belongsTo('\App\Supplier','id_supplier');
    }
}
