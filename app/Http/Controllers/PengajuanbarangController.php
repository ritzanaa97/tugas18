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
        if(Auth::user()->level=='bidang'){
        $pengajuanbarang=Pengajuanbarang::join('users','users.nip','=','pengajuanbarang.nip_mengajukan')
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
        if(Auth::user()->level=='bidang'){
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
            
        $pengajuanbarang=Pengajuanbarang::join('users','users.nip','=','pengajuanbarang.nip_mengajukan')
                        ->join('bidang','bidang.id_bidang','=','users.id_bidang')->get();
        $barang=Barang::all();
        $users=User::all();
        $detailpengajuanbarang=Dtl_pengajuanbarang::all();
        return view('Pengajuanbarang.daftar', compact('pengajuanbarang','barang', 'users','detailpengajuanbarang'));
        }else{
            return back();
        }
    }
    public function detailpengajuanbarang($id){ /*ini untuk view di menu detail pengajuan barang*/
        $detailpengajuan=Dtl_pengajuanbarang::join('barang','barang.id_barang','=','detailpengajuanbrg.id_barang')
                        ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
                        ->join('pengajuanbarang','pengajuanbarang.id_pengajuanbrg','=','detailpengajuanbrg.id_pengajuanbrg')
                        ->join('users','users.nip','=','pengajuanbarang.nip_mengajukan')
                        ->join('bidang','bidang.id_bidang','=','users.id_bidang')
                        ->where('pengajuanbarang.id_pengajuanbrg',$id)->get();

        return view('pengajuanbarang.detail', compact('detailpengajuan'));
    }
    public function serahbarang($id)
    {
        if(Auth::user()->level=='admin'){
        $serahbarang=Dtl_pengajuanbarang::join('barang','barang.id_barang','=','detailpengajuanbrg.id_barang')
                        ->join('satuan','satuan.id_satuan','=','barang.id_satuan')
                        ->join('pengajuanbarang','pengajuanbarang.id_pengajuanbrg','=','detailpengajuanbrg.id_pengajuanbrg')
                        ->join('users','users.nip','=','pengajuanbarang.nip_mengajukan')
                        ->join('bidang','bidang.id_bidang','=','users.id_bidang')
                        ->where('pengajuanbarang.id_pengajuanbrg',$id)->get();
        return view('pengajuanbarang.serahbarang', compact(['serahbarang']));
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
    public function store(Request $request) /*ini untuk melakukan pengajuan barang*/
    {
        $request['id_pengajuanbrg']=$this->getNewCodePB();
        Pengajuanbarang::insert([
                    'id_pengajuanbrg'=>$request['id_pengajuanbrg'],
                    'nip_mengajukan'=>Auth::user()->nip,
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
    public function update(Request $request)
    {
        $i=0;
        $jumlahserah=$request->jumlahserah;
        $keterangan=$request->keterangan_barang;

        foreach ($request->id_detailpengajuanbrg as $id_detailpengajuanbrg) {    
            $serahbarang=Dtl_pengajuanbarang::find($id_detailpengajuanbrg);
            $serahbarang->jumlahserah=$jumlahserah[$i];
            $serahbarang->keterangan_barang=$keterangan[$i];
        
        if($jumlahserah[$i]==1){
            $serahbarang->status_barang='terima';
            $barang=Barang::find($serahbarang->id_barang);
            $barang->jumlahbarang=$barang->jumlahbarang-$request->jumlahserah[$i];
            $barang->save();
        }else{
            $serahbarang->status_barang='tolak';
        }

        $serahbarang->save();
        $id_pengajuanbrg=$serahbarang->id_pengajuanbrg;
        $i++;

        }

        $pengajuanbarang=Pengajuanbarang::find($id_pengajuanbrg);
        $pengajuanbarang->nip_serah=Auth::user()->nip;
        $pengajuanbarang->tanggal_serah=now();
        $pengajuanbarang->status_pengajuan='selesai';
        $pengajuanbarang->save();

        return redirect('daftar');
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
