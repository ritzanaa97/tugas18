<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\User;
use App\Pengajuanbarang;
use App\Dtl_pengajuanbarang;

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
    public function riwayat(){
        $pengajuanbarang=Pengajuanbarang::all();
        $barang=Barang::all();
        $users=User::all();
        $detailpengajuanbarang=Dtl_pengajuanbarang::all();
        return view('Pengajuanbarang.riwayat', compact('pengajuanbarang','barang', 'users','detailpengajuanbarang'));
    }
    public function index()
    {
        $pengajuanbarang=Pengajuanbarang::all();
        $barang=Barang::all();
        $users=User::all();
        $detailpengajuanbarang=Dtl_pengajuanbarang::all();
        return view('Pengajuanbarang.pengajuanbarang', compact('pengajuanbarang','barang', 'users','detailpengajuanbarang'));
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
