<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\User;
use App\Pengajuanbarang;
use App\Dtl_pengajuanbarang;
use Auth;
use Excel;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function barang()
    {
        return \DB::table('barang')->get();
    }
    public function user()
    {
        return \DB::table('user')->get();
    }
    public function index(Request $request)
    {
        if(Auth::user()->level=='admin'){
            if(!$request->month){

               $barangkeluar=Pengajuanbarang::join('users','users.nip','=','pengajuanbarang.nip_mengajukan')
               ->join('bidang','bidang.id_bidang','=','users.id_bidang')
               ->get();

           }else{
            
            $barangkeluar=Pengajuanbarang::join('users','users.nip','=','pengajuanbarang.nip_mengajukan')
            ->join('bidang','bidang.id_bidang','=','users.id_bidang')
            ->where(\DB::raw('month(pengajuanbarang.tanggal_serah)'), $request->month)
            ->where(\DB::raw('year(pengajuanbarang.tanggal_serah)'), $request->year)->get();
        }

        $barang=Barang::all();
        $users=User::all();
        $detailbarangkeluar=Dtl_pengajuanbarang::all();
        return view('Barangkeluar.barangkeluar', compact('barangkeluar','barang', 'users','detailbarangkeluar'));
    }else{
        return back();
    }
}
public function detailbarangkeluar($id){ /*ini untuk view di menu detail pengajuan barang*/
    $detailbarangkeluar=Dtl_pengajuanbarang::join('barang','barang.id_barang','=','detailpengajuanbrg.id_barang')
    ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
    ->join('pengajuanbarang','pengajuanbarang.id_pengajuanbrg','=','detailpengajuanbrg.id_pengajuanbrg')
    ->join('users','users.nip','=','pengajuanbarang.nip_mengajukan')
    ->join('bidang','bidang.id_bidang','=','users.id_bidang')
    ->where('pengajuanbarang.id_pengajuanbrg',$id)->get();
    $pengajuanbarang=Pengajuanbarang::join('users','users.nip','=','pengajuanbarang.nip_mengajukan')
    ->join('bidang','bidang.id_bidang','=','users.id_bidang')
    ->orderBy('id_pengajuanbrg','desc')
    ->get();
    return view('barangkeluar.detail', compact('detailbarangkeluar','pengajuanbarang'));
}
public function printbarangkeluar(){
    $detailbarangkeluar=Dtl_pengajuanbarang::join('barang','barang.id_barang','=','detailpengajuanbrg.id_barang')
    ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
    ->join('pengajuanbarang','pengajuanbarang.id_pengajuanbrg','=','detailpengajuanbrg.id_pengajuanbrg')
    ->join('users','users.nip','=','pengajuanbarang.nip_mengajukan')
    ->join('bidang','bidang.id_bidang','=','users.id_bidang')->get();
    return view('barangkeluar.detail', compact('detailbarangkeluar'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function barangkeluarexport(Request $request){
        if($request->month){
            $exportbarang=Dtl_pengajuanbarang::select('pengajuanbarang.id_pengajuanbrg as No. Transaksi Serah Barang','nama_barang as Nama Barang','tanggal_serah as Tanggal Serah','nama_bidang as Nama Bidang yang Menerima','jumlahserah as Jumlah Keluar','jumlahbarang as Sisa Barang')
            ->join('barang','barang.id_barang','=','detailpengajuanbrg.id_barang')
            ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
            ->join('pengajuanbarang','pengajuanbarang.id_pengajuanbrg','=','detailpengajuanbrg.id_pengajuanbrg')
            ->join('users','users.nip','=','pengajuanbarang.nip_mengajukan')
            ->join('bidang','bidang.id_bidang','=','users.id_bidang')
            ->where(\DB::raw('month(pengajuanbarang.tanggal_serah)'), $request->month)->get();

            return Excel::create('data_barangkeluar',function($excel) use($exportbarang){
                $excel->sheet('laporanbarangkeluar',function($sheet) use($exportbarang){
                    $sheet->fromArray($exportbarang);
                });
            })->download('xls');
        }else{
            return back();
        }
    }
}
