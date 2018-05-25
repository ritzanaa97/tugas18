<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenisbarang extends Model
{
    protected $table='jenisbarang';
    protected $primaryKey='id_jenisbarang';
    public $incrementing = false;
    protected $fillable=['id_jenisbarang','nama_jenisbarang','kategori'];

    public function jenisbarang()
    {
        return $this->hasMany('\App\Barang','id_jenisbarang');
    }
}