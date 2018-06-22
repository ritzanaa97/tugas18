<?php

namespace App\Http\Controllers;

use App\Serahbarang;
use Illuminate\Http\Request;
use App\Barang;
use App\User;
use App\Pengajuanbarang;
use App\Dtl_pengajuanbarang;
use App\Detailserahbrg;
use Auth;

class SerahbarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if(Auth::user()->level=='admin'){
        $serahbarang=Dtl_pengajuanbarang::join('barang','barang.id_barang','=','detailpengajuanbrg.id_barang')
                        ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
                        ->join('pengajuanbarang','pengajuanbarang.id_pengajuanbrg','=','detailpengajuanbrg.id_pengajuanbrg')
                        ->join('users','users.nip','=','pengajuanbarang.nip')
                        ->join('bidang','bidang.id_bidang','=','users.id_bidang')
                        ->where('pengajuanbarang.id_pengajuanbrg',$id)->get();
        $id_pengajuanbrg=$id;
        $id_detailpengajuanbrg=Dtl_pengajuanbarang::all();
        return view('pengajuanbarang.serahbarang', compact(['serahbarang','id_pengajuanbrg','id_detailpengajuanbrg']));
        }else{
                return back();
            }
    }
    public function getNewCodeSB(){
        $depan='ACC';
        $prefix = date('ym');

        $lastTransaction = Serahbarang::orderBy('id_serahbrg', 'desc')->first();

        if (!is_null($lastTransaction)) {
            $lastInvoiceNo = $lastTransaction->id_serahbrg;
            if (substr($lastInvoiceNo, 0, 4) == $prefix) {
                return ++$lastInvoiceNo;
            }
        }

        return $depan.$prefix.'0001';
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request['id_serahbrg']=$this->getNewCodeSB();
        Serahbarang::insert([
                    'id_serahbrg'=>$request['id_serahbrg'],
                    'id_pengajuanbrg'=>$request->id_pengajuanbrg,
                    'tanggal_serahbarang'=>now(),
                    'nip'=>Auth::user()->nip,
                ]);
        if(isset($request->id_detailpengajuanbrg)){
            foreach ($request->id_detailpengajuanbrg as $key => $value) {
                Detailserahbrg::insert([
                    'id_detailpengajuanbrg'=>$value,
                    'jumlahserahbarang'=>$request->jumlahserahbarang[$key],
                    'created_at'=>now(),
                ]);
            }
        }
        // $Dtl_pengajuanbarang = Dtl_pengajuanbarang::find($request['id_serahbarang']);
        return redirect('/daftar');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Serahbarang  $serahbarang
     * @return \Illuminate\Http\Response
     */
    public function show(Serahbarang $serahbarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Serahbarang  $serahbarang
     * @return \Illuminate\Http\Response
     */
    public function edit(Serahbarang $serahbarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Serahbarang  $serahbarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serahbarang $serahbarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Serahbarang  $serahbarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serahbarang $serahbarang)
    {
        //
    }
}
