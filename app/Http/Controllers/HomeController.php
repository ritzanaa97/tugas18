<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\pengajuanbarang;
use App\Barangmasuk;
use App\Bidang;
use App\User;
use Auth;
use App\Barang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urutbidang=DB::table('pengajuanbarang')
                        ->join('users','users.nip','=','pengajuanbarang.nip_mengajukan')
                        ->join('bidang','bidang.id_bidang','=','users.id_bidang')
                        ->select('bidang.nama_bidang','pengajuanbarang.id_pengajuanbrg',DB::raw('sum(pengajuanbarang.id_pengajuanbrg) as totalpengajuan'))
                        ->where('pengajuanbarang.status_pengajuan','=','selesai')
                        ->groupBy('bidang.nama_bidang','pengajuanbarang.id_pengajuanbrg')
                        ->orderBy('totalpengajuan','desc')->get();
        $jumlahpengajuan=\App\Pengajuanbarang::count();
        $barang=Barang::all();
        return view('dashboard.dashboard', compact('jumlahpengajuan','urutbidang','barang'));
    }
    public function barang()
    {
        return view('barang.barang');
    }
    public function barangmasuk()
    {
        return view('barangmasuk.barangmasuk');
    }
    public function pengguna()
    {
        return view('admin.pengguna');
    }
        public function pengajuanbarang()
    {
        return view('pengajuanbarang.pengajuanbarang');
    }
}
