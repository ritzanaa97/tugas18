<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table='supplier';
    protected $primaryKey='id_supplier';
    protected $fillable=['id_supplier','nama_supplier'];

    public $incrementing = false;

    public function supplier()
    {
        return $this->hasMany('\App\Barang_masuk','id_supplier');
    }
}
