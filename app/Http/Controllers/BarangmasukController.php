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
        //
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
        $request['id_brgmasuk']=$this->getNewInvoiceNo();

        //$barangmasuk=Barang_masuk::create($request->except(['_token']));

        Barang_masuk::insert([
                    'id_brgmasuk'=>$request['id_brgmasuk'],
                    'id_supplier'=>$request->id_supplier,
                    'tanggal_masuk'=>$request->tanggal_masuk,
                ]);

        if(isset($request->id_barang)){
            foreach ($request->id_barang as $key => $value) {
                Detailbrgmasuk::insert([
                    'jumlahbrgmsk'=>$request->jumlahbrgmsk[$key],
                    'id_barang'=>$value,
                    'id_brgmasuk'=>$request['id_brgmasuk'],

                ]);
            }
        }
        return redirect('barangmasuk');

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
    // public function addbrgmasuk(Request $request)
    // {  
    //     $tanggal_masuk = Carbon::parse(($request->tanggal_masuk),'Asia/Jakarta');

    //     $barangmasuk = new Barang_masuk();
    //     $barangmasuk->id_brgmasuk=$this->getNewInvoiceNo();
    //     $barangmasuk->tanggal_masuk=$tanggal_masuk;
    //     $barangmasuk->id_supplier=$request->supplier;

    //     $barangmasuk->save();

    //     return redirect('/tambahbarangmasuk');
    // }
}
