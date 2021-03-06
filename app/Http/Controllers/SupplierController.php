<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;
use App\User;
use Auth;
use Alert;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level=='admin'){
            $supplier = Supplier::all();
            $user=User::all();
            return view('supplier.supplier', compact('supplier','user'));
        }else{
            
            return back();
        }
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
        $this->validate($request, [
            'nama_supplier' => 'required|string|max:255',
            'alamat' => 'required',

        ]);

        $nama_supplier = $request['nama_supplier'];
        $alamat = $request['alamat'];

        $supplier = new Supplier();
        $supplier->nama_supplier = $nama_supplier;
        $supplier->alamat = $alamat;

        $supplier->save();
        return redirect('/supplier')->with(['success' => 'Data Supplier Berhasil di Tambahkan']);
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
        $supplier=Supplier::find($id);
        $supplier->nama_supplier=$request->nama_supplier;
        $supplier->alamat=$request->alamat;
        $supplier->save();
        return redirect('/supplier')->with(['success' => 'Data Supplier Berhasil di Ubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_supplier)
    {
        $hapussupplier=Supplier::where('id_supplier',$id_supplier)->update(['status'=>'tidak aktif']);
        return redirect('/supplier')->with(['warning' => 'Data Supplier Berhasil di Nonaktifkan']); 
    }
}
