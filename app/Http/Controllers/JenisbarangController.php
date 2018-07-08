<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Barang;
use App\User;
use App\Jenisbarang;
use App\Satuan;
use Auth;
use Excel;


class JenisbarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function barang(){
        if(Auth::user()->level=='admin'){
            $barang=Barang::all();
            $jenisbarang = Jenisbarang::all();
            $satuan = Satuan::all();
            return view('jenisbarang.barang', compact('barang', 'jenisbarang', 'satuan'));
        }else{
            return back();
        }
    }

    public function jenisbarang()
    {
        if(Auth::user()->level=='admin'){
            $barang = Barang::all();
            $jenisbarang=Jenisbarang::all();
            return view('jenisbarang.jenisbarang',['jenisbarang'=>$jenisbarang,'barang'=>$barang]);
        }else{
            return back();
        }
    }

    public function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {

        // mengambil nilai kode ex: KNS0015 hasil KNS
        $kode = substr($id_terakhir, 0, $panjang_kode);

        // mengambil nilai angka
        // ex: KNS0015 hasilnya 0015
        $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);

        // menambahkan nilai angka dengan 1
        // kemudian memberikan string 0 agar panjang string angka menjadi 4
        // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
        // sehingga menjadi 0006
        $angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);

        // menggabungkan kode dengan nilang angka baru
        $id_baru = $kode.$angka_baru;

        return $id_baru;
    }
    public function store(Request $request)
    {
        $this->validate($request, [ //menvalidasi nama jenis barang dan kategori
            'nama_jenisbarang' => 'required',
            'kategori' => 'required',
        ]);
        $input = $request->all();
        $kategori = strtoupper($input['kategori']);
        $last_id = Jenisbarang::where('kategori', $kategori)->orderBy('created_at', 'desc')->first();
        $last_id = (!(empty($last_id))) ? JenisbarangController::autonumber($last_id->id_jenisbarang,3,3) : $kategori.'001'; 
        $input['id_jenisbarang'] = $last_id;
        $jb = new Jenisbarang;
        $jb->fill($input);
        $jb->save();
        return redirect('/jenisbarang')->with(['success' => 'Data Jenis Barang Berhasil di Tambahkan']);
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
    public function update(Request $request, $id_jenisbarang)
    {
        $updatejb=Jenisbarang::find($id_jenisbarang);
        $updatejb->nama_jenisbarang=$request->nama_jenisbarang;
        $updatejb->kategori=$request->kategori;
        $updatejb->save();

        return redirect('/jenisbarang')->with(['success' => 'Data Jenis Barang Berhasil di Ubah']);
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
    public function jenisbarangexport(){

        $jenisbarang=Jenisbarang::select('id_jenisbarang as Kode Jenis Barang','nama_jenisbarang as Nama Jenis Barang','kategori as kategori Barang')->get();

        return Excel::create('data_jenisbarang',function($excel) use($jenisbarang){
            $excel->sheet('mysheet',function($sheet) use($jenisbarang){
                $sheet->fromArray($jenisbarang);
            });
        })->download('xls');
    }

    public function jenisbarangimport(Request $request){
        if($request->hasFile('jenisbarangimport')){
            $simpan='';
            $path=$request->file('jenisbarangimport')->getRealPath();
            $data=Excel::load($path, function($reader){})->get();
            if(!empty($data) && $data->count()){
                foreach($data as $key=>$value){
                    $cek=Jenisbarang::where('nama_jenisbarang',$value->nama_jenis_barang)->count();
                    if($cek==0){
                        $jenisbarang=new Jenisbarang();
                        $kategori = strtoupper($value->jenis_barang);
                        
                        if($simpan==''){
                            $last_id = Jenisbarang::where('kategori', $kategori)->orderBy('created_at', 'desc')->first();
                            $last_id = (!(empty($last_id))) ? JenisbarangController::autonumber($last_id->id_jenisbarang,3,3) : $kategori.'001'; 
                        }else{
                            $last_id = (!(empty($last_id))) ? JenisbarangController::autonumber($simpan,3,3) : $kategori.'001'; 
                        }
                        $jenisbarang->id_jenisbarang=$last_id;
                        $jenisbarang->nama_jenisbarang=$value->nama_jenis_barang;
                        $jenisbarang->kategori=$value->jenis_barang;
                        $jenisbarang->save();

                        $simpan=$jenisbarang->id_jenisbarang;

                    }
                }
            }
        }
        return back()->with(['success' => 'Import Data Excel Jenis Barang Berhasil']);
    }
}
