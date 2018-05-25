<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table='bidang';
    protected $primaryKey='id_bidang';
    protected $fillable=['id_bidang','nama_bidang'];

    public $incrementing = false;//ketika id berupa varchar

    public function bidang()
    {
        return $this->hasMany('\App\Users','id_bidang');
    }
    
}
