<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table='satuan';
    protected $primaryKey='id_satuan';
    protected $fillable=['id_satuan','nama_satuan'];

    public function satuan()
    {
        return $this->hasMany('\App\Barang','id_satuan');
    }
}
