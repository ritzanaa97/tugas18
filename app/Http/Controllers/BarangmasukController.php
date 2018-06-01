<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Barang;
use App\Supplier;
use App\Barang_masuk;
use App\Detailbrgmasuk;
use Carbon\Carbon;

class BarangmasukController extends Controller
{
    public function barangmasuk(){
        $barangmasuk=Barang_masuk::all();
        $barang=Barang::all();
        $supplier=Supplier::all();
        $detailbrgmasuk=Detailbrgmasuk::all();
        return view('barangmasuk.tambahbarangmasuk', compact('barangmasuk','barang', 'supplier','detailbrgmasuk'));
    }
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
    // public function addbrgmasuk(Request $data)
    // {
    //     User::create([
    //         'nama_barang' => $data['nama_barang'],
    //         'jumlahbrgmsk'=> $data['jumlahbrgmsk']
    //     ]);
    //     return redirect('/barangmasuk');
    // }
    public function index()
    {
        return view('barangmasuk.barangmasuk');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Barang_masuk::create([
            'id_brgmasuk' => $data['nama_lengkap'],
        ]);
        return redirect('/barangmasuk');
    }

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
        $tanggal_masuk = Carbon::parse(($request->tanggal_masuk),'Asia/Jakarta');

        $kodebm = new Barang_masuk();
        $kodebm->id_brgmasuk=$this->getNewInvoiceNo();
        $kodebm->tanggal_masuk=$tanggal_masuk;
        $kodebm->supplier=$request->supplier;

        $kodebm->save();
        dd($kodebm);

        return $kodebm;
        // dd("lele");   
        // $pilihbrgmsk = 'BM-';
        // $idbrgmasuk = Barang_masuk::where('id_brgmasuk',$pilihbrgmsk)->orderBy('created_at','desc')->first();
        // $idbrgmasuk = (!(empty($idbrgmasuk))) ? BarangmasukController::autonumber($idbrgmasuk->id_brgmasuk ,2,5) : $pilihbrgmsk.'00001';
        // $inputbrgmasuk['id_brgmasuk'] = $idbrgmasuk;
        // $request['id_brgmasuk']=$inputbrgmasuk;
        // //dd($request['id_brgmasuk']);

        // $barangmasuk = new Barang_masuk;
        // $barangmasuk->id_brgmasuk=$request->id_brgmasuk;
        // $barangmasuk->tanggal_masuk=$request->tanggal_masuk;
        // $barangmasuk->id_supplier=$request->supplier;
        // //dd($barangmasuk);
        // $barangmasuk->save();

        //return $request->all();
        // $barangmasuk = Barang_masuk::create($request->except(['_token']));

        // if(isset($request->id_barang)){
        //     foreach ($request->id_barang as $key => $value) {
        //         Detailbrgmasuk::insert([
        //             'id_barang'=>$value,
        //             'jumlahbrgmsk'=>$request->jumlahbrgmsk[$key],
        //             'id_brgmasuk'=>$request['id_brgmasuk'],
                    
        //         ]);
        //     }
        // }

        // return redirect('/barangmasuk');
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
