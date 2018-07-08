<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bidang;
use App\User;
use Auth;
use Excel;
use Alert;
use DB;
use Hash;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        if(Auth::user()->level=='admin'){
            $bidang=\DB::table('bidang')->get();
            return view('/user.pengguna',compact('bidang'));
        }else{
            return back();
        }
    }
    public function masterusers(){
        if(Auth::user()->level=='admin'){
            $users = User::all();
            $bidang=Bidang::all();
            return view('user.pengguna',compact('users','bidang'));
        }else{
            return back();
        }
    }
    public function bidang()
    {
        return \DB::table('bidang')->get();
    }
    
    public function index()
    {
        
    }
    public function create()
    {
        //
    }
    public function tampilubah(){
        if(Auth::user()->level=='bidang'){
            $users = User::all();
            $bidang=Bidang::all();
            return view('user.ubahpassword',compact('users','bidang'));
        }else{
            return back();
        }
    }
    public function ubahpassword(Request $request){
        if(Auth::user()->level=='bidang'){
            $ubahpassword=User::find(Auth::user()->nip);
            if(Hash::check($request->password_lama, $ubahpassword->password)){
                $ubahpassword->password=bcrypt($request->password_baru);
                $ubahpassword->save();
                return view('user.ubahpassword');   
            }
        }else{
            return back();
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:255|unique:users',
            'nama_lengkap' => 'required|string|max:255',
            'bidang' => 'required',
            'level'=>'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $nip = $request['nip'];
        $nama_lengkap = $request['nama_lengkap'];
        $bidang = $request['bidang'];
        $level = $request['level'];
        $password = bcrypt($request['password']);
        $created_by = Auth::user()->nama_lengkap;

        $users = new User();
        $users->nip = $nip;
        $users->nama_lengkap = $nama_lengkap;
        $users->id_bidang = $bidang;
        $users->level = $level;
        $users->password = $password;
        $users->created_by = $created_by;

        $users->save();

        return redirect('/pengguna')->with(['success' => 'Data Pengguna Berhasil di Daftarkan']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }
    public function resetpassword($nip){
        $user=DB::table('users')->where('nip',$nip)->update(['password' => bcrypt($nip)]);
        return redirect('/pengguna')->with(['success' => 'Data Password Pengguna berhasil di Reset']);

    }

    public function update(Request $request, $nip)
    {
        $pengguna=User::find($nip);
        $pengguna->nip=$request->nip;
        $pengguna->level=$request->level;
        $pengguna->nama_lengkap=$request->nama_lengkap;
        $pengguna->id_bidang=$request->bidang;
        $pengguna->save();

        return redirect('/pengguna')->with(['success' => 'Data Pengguna Berhasil di Ubah']);
    }


    public function destroy($nip)
    {
        $hapususers=User::where('nip',$nip)
        ->update(['status'=>'tidak aktif']);

        return redirect('/pengguna')->with(['success' => 'Data Pengguna Berhasil di Nonaktifkan']); 
    }
}
