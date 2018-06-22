<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serahbarang extends Model
{
    protected $table='serahbarang';
    protected $primaryKey='id_serahbrg';
    protected $fillable=['id_serahbrg','id_pengajuanbrg','id_detailpengajuanbrg','tanggal_serahbarang','nip'];

    public $incrementing = false;

    public function pengajuanbarang()
    {
        return $this->belongsTo('\App\Pengajuanbarang','id_pengajuanbrg');
    }
    public function detailpengajuanbarang()
    {
        return $this->belongsTo('\App\Dtl_pengajuanbarang','id_detailpengajuanbrg');
    }
}
