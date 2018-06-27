<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\User;
use App\Pengajuanbarang;
use App\Dtl_pengajuanbarang;
use Auth;

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
    public function index()
    {
        if(Auth::user()->level=='admin'){
            
        $barangkeluar=Pengajuanbarang::join('users','users.nip','=','pengajuanbarang.nip_mengajukan')
                        ->join('bidang','bidang.id_bidang','=','users.id_bidang')
                        ->get();
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
}
