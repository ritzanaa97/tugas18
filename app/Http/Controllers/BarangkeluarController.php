<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Bidang;
use App\Barang_keluar;
use App\Detailbrgkeluar;

class BarangkeluarController extends Controller
{
    public function barang()
    {
        return \DB::table('barang')->get();
    }
    public function bidang()
    {
        return \DB::table('bidang')->get();
    }
    public function Detailbrgkeluar(){
        return \DB::table('detailbrgkeluar')->get();
    }
    public function barangkeluar(){
        $barangkeluar=Barang_keluar::all();
        $barang=Barang::all();
        $bidang=Bidang::all();
        return view('barangkeluar.tambahbarangkeluar', compact('barangkeluar','barang', 'bidang'));
    }
    public function index()
    {
        $barangkeluar=Barang_keluar::all();
        $barang=Barang::all();
        $bidang=Bidang::all();
        return view('barangkeluar.barangkeluar', compact('barangkeluar','barang', 'bidang'));
    }

    public function detailbk(){
        return view('barangkeluar.detailkeluar');
    }
    public function getNewCodeBK(){
        $prefix = date('ym');

        $lastTransaction = Barang_keluar::orderBy('id_brgkeluar', 'desc')->first();

        if (!is_null($lastTransaction)) {
            $lastInvoiceNo = $lastTransaction->id_brgkeluar;
            if (substr($lastInvoiceNo, 0, 4) == $prefix) {
                return ++$lastInvoiceNo;
            }
        }

        return $prefix.'0001';
    }
    public function store(Request $request)
    {
        $request['id_brgkeluar']=$this->getNewCodeBK();

        Barang_keluar::insert([
                    'id_brgkeluar'=>$request['id_brgkeluar'],
                    'id_bidang'=>$request->id_bidang,
                    'tanggal_keluar'=>$request->tanggal_keluar,
                ]);

        if(isset($request->id_barang)){
            foreach ($request->id_barang as $key => $value) {
                Detailbrgkeluar::insert([
                    'jumlahbrgkeluar'=>$request->jumlahbrgkeluar[$key],
                    'id_barang'=>$value,
                    'id_brgkeluar'=>$request['id_brgkeluar'],
                ]);
            }
        }
        return redirect('barangkeluar');
    }
    public function create()
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
