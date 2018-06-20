<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\User;
use App\Pengajuanbarang;
use App\Dtl_pengajuanbarang;
use Auth;

class PengajuanbarangController extends Controller
{
    public function barang()
    {
        return \DB::table('barang')->get();
    }
    public function user()
    {
        return \DB::table('user')->get();
    }
    public function riwayat(){ /*ini untuk view di menu riwayat*/
        if(Auth::user()->level=='admin'){
        $pengajuanbarang=Pengajuanbarang::join('users','users.nip','=','pengajuanbarang.nip')
                        ->join('bidang','bidang.id_bidang','=','users.id_bidang')->get();
        $barang=Barang::all();
        $users=User::all();
        $detailpengajuanbarang=Dtl_pengajuanbarang::all();
        return view('Pengajuanbarang.riwayat', compact('pengajuanbarang','barang', 'users','detailpengajuanbarang'));
        }else{
            return back();
        }
    }
    public function index()  /*ini untuk view di menu pengajuanbarang*/
    {
        if(Auth::user()->level=='admin'){
        $pengajuanbarang=Pengajuanbarang::all();
        $barang=Barang::all();
        $users=User::all();
        $detailpengajuanbarang=Dtl_pengajuanbarang::all();
        return view('Pengajuanbarang.pengajuanbarang', compact('pengajuanbarang','barang', 'users','detailpengajuanbarang'));
        }else{
            return back();
        }
    }
    public function daftar() /*ini untuk view di menu daftar pengajuan barang*/
    {
        if(Auth::user()->level=='admin'){
            
        $pengajuanbarang=Pengajuanbarang::join('users','users.nip','=','pengajuanbarang.nip')
                        ->join('bidang','bidang.id_bidang','=','users.id_bidang')->get();
        $barang=Barang::all();
        $users=User::all();
        $detailpengajuanbarang=Dtl_pengajuanbarang::all();
        return view('Pengajuanbarang.daftar', compact('pengajuanbarang','barang', 'users','detailpengajuanbarang'));
        }else{
            return back();
        }
    }
    public function serahbarang($id)
    {
        if(Auth::user()->level=='admin'){
        $serahbarang=Dtl_pengajuanbarang::join('barang','barang.id_barang','=','detailpengajuanbrg.id_barang')
                        ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
                        ->join('pengajuanbarang','pengajuanbarang.id_pengajuanbrg','=','detailpengajuanbrg.id_pengajuanbrg')
                        ->join('users','users.nip','=','pengajuanbarang.nip')
                        ->join('bidang','bidang.id_bidang','=','users.id_bidang')
                        ->where('pengajuanbarang.id_pengajuanbrg',$id)->get();
        $id_pengajuanbrg=$id;
        return view('pengajuanbarang.serahbarang', compact('serahbarang','$id_pengajuanbrg'));
        }else{
                return back();
            }
    }
    public function detailpengajuanbarang($id){ /*ini untuk view di menu detail pengajuan barang*/
        if(Auth::user()->level=='admin'){
        $detailpengajuan=Dtl_pengajuanbarang::join('barang','barang.id_barang','=','detailpengajuanbrg.id_barang')
                        ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
                        ->join('pengajuanbarang','pengajuanbarang.id_pengajuanbrg','=','detailpengajuanbrg.id_pengajuanbrg')
                        ->join('users','users.nip','=','pengajuanbarang.nip')
                        ->join('bidang','bidang.id_bidang','=','users.id_bidang')
                        ->where('pengajuanbarang.id_pengajuanbrg',$id)->get();

        return view('pengajuanbarang.detailriwayat', compact('detailpengajuan'));
        }else{
            return back();
        }
    }
    public function belumdiserahkan()  /*ini untuk view di menu barang yang belum diserahkan*/
    {
        if(Auth::user()->level=='admin'){
        $pengajuanbarang=Pengajuanbarang::all();
        $barang=Barang::all();
        $users=User::all();
        $detailpengajuanbarang=Dtl_pengajuanbarang::all();
        return view('Pengajuanbarang.belumdiserahkan', compact('pengajuanbarang','barang', 'users','detailpengajuanbarang'));
        }else{
            return back();
        }
    }
    public function sudahdiserahkan()  /*ini untuk view di menu barang yang sudah diserahkan*/
    {
        if(Auth::user()->level=='admin'){
        $pengajuanbarang=Pengajuanbarang::all();
        $barang=Barang::all();
        $users=User::all();
        $detailpengajuanbarang=Dtl_pengajuanbarang::all();
        return view('Pengajuanbarang.sudahdiserahkan', compact('pengajuanbarang','barang', 'users','detailpengajuanbarang'));
        }else{
            return back();
        }
    }
    public function getNewCodePB(){
        $prefix = date('ym');

        $lastTransaction = Pengajuanbarang::orderBy('id_pengajuanbrg', 'desc')->first();

        if (!is_null($lastTransaction)) {
            $lastInvoiceNo = $lastTransaction->id_pengajuanbrg;
            if (substr($lastInvoiceNo, 0, 4) == $prefix) {
                return ++$lastInvoiceNo;
            }
        }

        return $prefix.'0001';
    }
    public function ajukan(Request $request){
        $request['id_pengajuanbrg']=$this->getNewCodePB();
        Pengajuanbarang::insert([
                    'id_pengajuanbrg'=>$request['id_pengajuanbrg'],
                    'nip'=>Auth::user()->nip,
                    'tanggal_pengajuan'=>now(),
                ]);

        if(isset($request->id_barang)){
            foreach ($request->id_barang as $key => $value) {
                Dtl_pengajuanbarang::insert([
                    'jumlahpengajuan'=>$request->jumlahpengajuan[$key],
                    'id_barang'=>$value,
                    'id_pengajuanbrg'=>$request['id_pengajuanbrg'],
                ]);
            }
        }
        // $Dtl_pengajuanbarang = Dtl_pengajuanbarang::find($request['id_pengajuanbrg']);
        return redirect('riwayat');
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
}
