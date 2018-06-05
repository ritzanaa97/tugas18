<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table='bidang';
    protected $primaryKey='id_bidang';
    protected $fillable=['id_bidang','nama_bidang'];

    public function bidang()
    {
        return $this->hasMany('\App\User','id_bidang');
    }
    
}
