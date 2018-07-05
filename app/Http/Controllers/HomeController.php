<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Barang_masuk;
use App\Bidang;
use App\User;
use Auth;
use App\Barang;
use App\Pengajuanbarang;

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
        $barang=Barang::all();
        $barangmasuk=Barang_masuk::all();
        $urutbidang=DB::table('pengajuanbarang')
                        ->join('users','users.nip','=','pengajuanbarang.nip_mengajukan')
                        ->join('bidang','bidang.id_bidang','=','users.id_bidang')
                        ->select('bidang.nama_bidang','pengajuanbarang.id_pengajuanbrg',DB::raw('sum(pengajuanbarang.id_pengajuanbrg) as totalpengajuan'))
                        ->where('pengajuanbarang.status_pengajuan','=','selesai')
                        ->groupBy('bidang.nama_bidang','pengajuanbarang.id_pengajuanbrg')
                        ->orderBy('totalpengajuan','desc')->get();
        $pengajuanbarang=DB::table('pengajuanbarang')->where('pengajuanbarang.status_pengajuan','=','proses')->get();
        $serahbarang=DB::table('pengajuanbarang')->where('pengajuanbarang.status_pengajuan','=','selesai')->get();
        return view('dashboard.dashboard', compact('jumlahpengajuan','jumlahbm','urutbidang','barang','pengajuanbarang','barangmasuk','serahbarang'));
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
