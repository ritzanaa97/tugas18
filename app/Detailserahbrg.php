<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailserahbrg extends Model
{
    protected $table='detailserahbrg';
    protected $primaryKey='id_detailserahbrg';
    protected $fillable=['id_detailserahbrg','id_serahbrg','jumlahserahbarang'];

    public $incrementing = false;

    public function serahbarang()
    {
        return $this->belongsTo('\App\Serahbarang','id_serahbrg');
    }
}
