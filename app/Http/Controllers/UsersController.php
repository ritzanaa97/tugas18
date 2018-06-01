<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bidang;
use App\User;

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
        $bidang=\DB::table('bidang')->get();
        return view('user.pengguna',compact('bidang'));
    }
    public function tambahuser(Request $data)
    {
        User::create([
            'nip'=>$data['nip'],
            'nama_lengkap'=>$data['nama_lengkap'],
            'id_bidang'=>$data['bidang'],
            'password'=>$data['password'],
            'level'=>$data['level'],
            'status'=>$data['status'],
        ]);
        return redirect('/user.pengguna');
    }
    public function masterusers(){
        $bidang=Bidang::all();
        $users = User::all();
        return view('user.pengguna',compact('bidang','users'));
    }
    public function bidang()
    {
        return \DB::table('bidang')->get();
    }
    // public function seksi()
    // {
    //     return \DB::table('seksi')->join('bidang','bidang.id_bidang=seksi.id_bidang')->get();
    // }
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
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    
    public function update(Request $request, $id_users)
    {
        $pengguna=User::find($id_users);
        $pengguna->level=$request->level;
        $pengguna->nama_lengkap=$request->nama_lengkap;
        $pengguna->nip=$request->nip;
        $pengguna->id_bidang=$request->id_bidang;
        $pengguna->username=$request->username;
        $pengguna->save();

        return redirect('/user.pengguna');
    }

   
    public function destroy($id_users)
    {
        // $users = User::find($id);
        // if($users){
        //     $users->destroy();
        //     $msg = 'HAPUS USER BERHASIL';
        // }else{
        //     $msg = 'HAPUS USER GAGAL';
        // }
        // return redirect()->back()->withSuccess($msg);   
    }
}
