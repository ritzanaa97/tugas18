<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Barang;
use App\Supplier;
use App\Barang_masuk;
use App\Detailbrgmasuk;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Pengajuanbarang;
use App\Dtl_pengajuanbarang;
use Excel;

class BarangmasukController extends Controller
{
    public function barang()
    {
        return \DB::table('barang')->get();
    }
    public function supplier()
    {
        return \DB::table('supplier')->get();
    }
    public function Detailbrgmasuk(){
        return \DB::table('detailbrgmasuk')->get();
    }
    public function barangmasuk(){
        if(Auth::user()->level=='admin'){
        $barangmasuk=Barang_masuk::all();
        $barang=Barang::all();
        $supplier=Supplier::all();
        $detailbrgmasuk=Detailbrgmasuk::all();
        return view('barangmasuk.tambahbarangmasuk', compact('barangmasuk','barang', 'supplier','detailbrgmasuk'));
        }else{
                return back();
            }
    }

    public function index(Request $request)
    {
        if(!$request->month){

        $barangmasuk=Barang_masuk::join('supplier','supplier.id_supplier','=','barangmasuk.id_supplier')
                                    ->join('users','barangmasuk.created_by','=','users.nama_lengkap')
                                    ->where('users.nama_lengkap',Auth::user()->nama_lengkap)->get();
        }else{
            
        $barangmasuk=Barang_masuk::join('supplier','supplier.id_supplier','=','barangmasuk.id_supplier')
                                    ->join('users','barangmasuk.created_by','=','users.nama_lengkap')
                                    ->where('users.nama_lengkap',Auth::user()->nama_lengkap)
                                    ->where(\DB::raw('month(barangmasuk.tanggal_masuk)'), $request->month)
                                    ->where(\DB::raw('year(barangmasuk.tanggal_masuk)'), $request->year)->get();
        }
        $barang=Barang::all();
        $supplier=Supplier::all();
        $detailbrgmasuk=Detailbrgmasuk::all();
        return view('barangmasuk.barangmasuk', compact('barangmasuk','barang', 'supplier','detailbrgmasuk'));
    }
    public function detailtransaksi($id)
    {
        if(Auth::user()->level=='admin'){
        $detailtransaksi=Detailbrgmasuk::join('barang','barang.id_barang','=','detailbrgmasuk.id_barang')
                        ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
                        ->join('barangmasuk','barangmasuk.id_brgmasuk','=','detailbrgmasuk.id_brgmasuk')
                        ->join('supplier','supplier.id_supplier','=','barangmasuk.id_supplier')
                        ->where('barangmasuk.id_brgmasuk',$id)->get();

        return view('barangmasuk.detailtransaksi', compact('detailtransaksi'));
        }else{
                return back();
            }
    }
    public function terimabarang()
    {
        if(Auth::user()->level=='bidang'){
        $terimabarang=Pengajuanbarang::join('users','users.nip','=','pengajuanbarang.nip_mengajukan')
                        ->join('bidang','bidang.id_bidang','=','users.id_bidang')
                        ->where('users.id_bidang',Auth::user()->id_bidang)->get();
        $barang=Barang::all();
        $users=User::all();
        $detailpengajuanbarang=Dtl_pengajuanbarang::all();
        return view('barangmasuk.terimabarang', compact('terimabarang','barang', 'users','detailpengajuanbarang'));
        }else{
                return back();
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNewInvoiceNo()
    {
        $prefix = date('ym');

        $lastTransaction = Barang_masuk::orderBy('id_brgmasuk', 'desc')->first();

        if (!is_null($lastTransaction)) {
            $lastInvoiceNo = $lastTransaction->id_brgmasuk;
            if (substr($lastInvoiceNo, 0, 4) == $prefix) {
                return ++$lastInvoiceNo;
            }
        }

        return $prefix.'0001';
    }

    public function store(Request $request)
    {
        $request['id_brgmasuk']=$this->getNewInvoiceNo();

        //$barangmasuk=Barang_masuk::create($request->except(['_token']));

        Barang_masuk::insert([
                    'id_brgmasuk'=>$request['id_brgmasuk'],
                    'id_supplier'=>$request->id_supplier,
                    'tanggal_masuk'=>$request->tanggal_masuk,
                    'created_at'=>now(),
                    'created_by'=>Auth::user()->nama_lengkap,
                ]);

        if(isset($request->id_barang)){
            foreach ($request->id_barang as $key => $value) {
                Detailbrgmasuk::insert([
                    'jumlahbrgmsk'=>$request->jumlahbrgmsk[$key],
                    'id_barang'=>$value,
                    'id_brgmasuk'=>$request['id_brgmasuk'],
                    'created_at'=>now(),
                    'created_by'=>Auth::user()->nama_lengkap,
                ]);

                $barang=Barang::find($value);
                $barang->jumlahbarang=$barang->jumlahbarang+$request->jumlahbrgmsk[$key];
                $barang->save();
            }
        }
        return redirect('barangmasuk');

    }
    public function create()
    {
        //
    }
    public function show($id)
    {
        // $detailtransaksi=Detailbrgmasuk::find($id);
        // return view('barangmasuk/detailtransaksi',compact('detailtransaksi'));
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
    public function barangmasukexport(Request $request){
        $exportbarang=Detailbrgmasuk::select('id_brgmasuk as No. Transaksi Masuk','tanggal_masuk as Tanggal Masuk','nama_supplier as Pemasok','nama_barang as Nama Barang','jumlahbrgmsk as Jumlah Barang Masuk')
                        ->join('barang','barang.id_barang','=','detailbrgmasuk.id_barang')
                        ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
                        ->join('barangmasuk','barangmasuk.id_brgmasuk','=','detailbrgmasuk.id_brgmasuk')
                        ->join('supplier','supplier.id_supplier','=','barangmasuk.id_supplier')
                        ->where('barangmasuk.id_brgmasuk')
                        ->where(\DB::raw('month(barangmasuk.tanggal_masuk)'), $request->month)->get();

        return Excel::create('data_barangmasuk',function($excel) use($exportbarang){
            $excel->sheet('mysheet',function($sheet) use($exportbarang){
                $sheet->fromArray($exportbarang);
            });
        })->download('xls');
    }
}
