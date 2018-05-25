<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Barang;
use App\Supplier;
use App\Barang_masuk;

class BarangmasukController extends Controller
{
    public function barangmasuk(){
        $barangmasuk=Barang_masuk::all();
        $barang=Barang::all();
        $supplier=Supplier::all();
        return view('admin.barangmasuk', compact('barangmasuk','barang', 'supplier'));
    }
    public function barang()
    {
        return \DB::table('barang')->get();
    }
    public function supplier()
    {
        return \DB::table('supplier')->get();
    }
    public function addbrgmasuk(Request $data)
    {
        User::create([
            'nama_barang' => $data['nama_barang'],
            'jumlahbrgmsk'=> $data['jumlahbrgmsk']
        ]);
        return redirect('/barangmasuk');
    }
    public function index()
    {
        //
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
        $barangmasuk=Barang_masuk::find($id_brgmasuk);
        $barangmasuk->id_brgmasuk=$request->id_brgmasuk;
        $barangmasuk->tanggal_masuk=date('Y-m-d');
        $barangmasuk->supplier=$request->nama_supplier;
        $barangmasuk->barang=$request->nama_barang;
        $barangmasuk->jumlahbrgmsk=$request->jumlahbrgmsk;
        $barangmasuk->save();

        return redirect('/barangmasuk');
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
