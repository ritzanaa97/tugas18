<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\User;
use App\Jenisbarang;
use App\Satuan;
use Auth;
use Excel;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tampilbarang(){
        if(Auth::user()->level=='admin'){
        $barang=Barang::all();
        $jenisbarang = Jenisbarang::all();
        $satuan = Satuan::all();
        
        return view('barang.barang', compact('barang', 'jenisbarang', 'satuan'));
        }else{
            return back();
        }
    }
    public function satuan()
    {
        return \DB::table('satuan')->get();
    }
    public function jenisbarang()
    {
        if(Auth::user()->level=='admin'){
        $barang = Barang::all();
        $jenisbarang=Jenisbarang::all();
        return view('barang.jenisbarang',['jenisbarang'=>$jenisbarang,'barang'=>$barang]);
        }else{
            return back();
        }
    }
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_barang'=> 'required',
            'nama_barang' => 'required',
            'id_jenisbarang' => 'required',
            'id_satuan' => 'required',
            'jumlahbarang' => 'required',
        ]);

        $barang = new Barang;
        $barang['id_barang']=$request->id_jenisbarang.$request->id_barang;
        $barang->nama_barang=$request->nama_barang;
        $barang->id_jenisbarang=$request->id_jenisbarang;
        $barang->id_satuan=$request->id_satuan;
        $barang->jumlahbarang=$request->jumlahbarang;
        $barang->save();

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

    public function update(Request $request, $id_barang)
    {
        $barang=Barang::find($id_barang);
        $barang->id_barang=$request->id_barang;
        $barang->nama_barang=$request->nama_barang;
        $barang->id_jenisbarang=$request->jenisbarang;
        $barang->jumlahbarang=$request->jumlahbarang;
        $barang->save();

        return redirect('/barang');
    }

    public function destroy($id)
    {
        //
    }
    public function barangexport(){

        $barang=Barang::select('id_barang as Kode Barang','nama_barang as Nama Barang','nama_jenisbarang as Jenis Barang','nama_satuan as Satuan','jumlahbarang as Jumlah Barang')
                    ->join('jenisbarang','jenisbarang.id_jenisbarang','=','barang.id_jenisbarang')
                    ->join('satuan','satuan.id_satuan','=','barang.id_satuan')->get();

        return Excel::create('data_barang',function($excel) use($barang){
            $excel->sheet('mysheet',function($sheet) use($barang){
                $sheet->fromArray($barang);
            });
        })->download('xls');
    }
    public function barangimport(Request $request){
        if($request->hasFile('barangimport')){
            $simpan='';
            $path=$request->file('barangimport')->getRealPath();
            $data=Excel::load($path, function($reader){})->get();
            if(!empty($data) && $data->count()){
                foreach($data as $key=>$value){
                    $cek=Barang::where('nama_barang',$value->nama_barang)->count();
                    if($cek==0){
                        if(empty(Jenisbarang::find($value->id_jenisbarang)) && empty(Satuan::find($value->id_satuan)) ){
                            $jenisbarang = new Jenisbarang();
                            $jenisbarang->nama_jenisbarang=$value->nama_jenisbarang;
                            $jenisbarang->id_jenisbarang=$value->id_jenisbarang;
                            $jenisbarang->save();

                            $satuan = new Satuan();
                            $satuan->id_satuan=$value->id_satuan;
                            $satuan->nama_satuan=$value->nama_satuan;
                            $satuan->save();

                            $barang=new Barang();
                            $barang['id_barang']=$request->id_jenisbarang.$request->id_barang;
                            $barang->nama_barang=$value->nama_barang;
                            $barang->jumlahbarang=$value->jumlahbarang;
                            $barang->id_jenisbarang=$value->id_jenisbarang;
                            $barang->id_satuan=$value->id_satuan;
                            $barang->save();
                        }elseif (!empty(Jenisbarang::find($value->id_jenisbarang)) && empty(Satuan::find($value->id_satuan)) && empty(Barang::find($value->nama_barang))) {
                            $barang=new Barang();
                            $barang['id_barang']=$request->id_jenisbarang.$request->id_barang;
                            $barang->nama_barang=$value->nama_barang;
                            $barang->jumlahbarang=$value->jumlahbarang;
                            $barang->id_jenisbarang=$value->id_jenisbarang;
                            $barang->id_satuan=$value->id_satuan;
                            $barang->save();

                        }elseif ($cek!=0) {
                            Barang::where('nama_barang',$value->nama_barang)->update([
                                'jumlahbarang'=>$value->jumlahbarang,
                            ]);
                        }
                    }
                }
            }
        }
        return back();
    }
}
