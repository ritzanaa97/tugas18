<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\User;
use App\Jenisbarang;
use App\Satuan;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tampilbarang(){
        $barang=Barang::all();
        $jenisbarang = Jenisbarang::all();
        $satuan = Satuan::all();
        return view('barang.barang', compact('barang', 'jenisbarang', 'satuan'));
    }
    public function satuan()
    {
        return \DB::table('satuan')->get();
    }
    public function jenisbarang()
    {
        $barang = Barang::all();
        $jenisbarang=Jenisbarang::all();
        return view('barang.jenisbarang',['jenisbarang'=>$jenisbarang,'barang'=>$barang]);
    }
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
        $kode = substr($id_terakhir, 0, $panjang_kode);
        $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
        $angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
        $id_baru = $kode.$angka_baru;

        return $id_baru;
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_barang' => 'required',
            'id_jenisbarang' => 'required',
            'id_satuan' => 'required',
            'kategori' => 'required',
            'jumlahbarang' => 'required',
        ]);

        $inputbarang = $request->all();
        $pilihjenis = $inputbarang['id_jenisbarang'];
        $idbarang = Barang::where('id_jenisbarang',$pilihjenis)->orderBy('created_at','desc')->first();
        $idbarang = (!(empty($idbarang))) ? BarangController::autonumber($idbarang->id_barang ,6,6) : $pilihjenis.'000001'; 
        $inputbarang['id_barang'] = $idbarang;
        $pb = new Barang;
        $pb->fill($inputbarang);
        $pb->save();

        return redirect('/barang');
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
