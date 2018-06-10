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
        return view('/user.pengguna',compact('users','bidang'));
    }
    public function masterusers(){
        $users = User::all();
        $bidang=Bidang::all();
        return view('user.pengguna')->with('users',$users)
                                    ->with('bidang',$bidang);
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
        $this->validate($request, [
            'nip' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'bidang' => 'required',
            'password' => 'required|string|min:6|confirmed',

        ]);

        $nip = $request['nip'];
        $nama_lengkap = $request['nama_lengkap'];
        $bidang = $request['bidang'];
        $password = bcrypt($request['password']);

        $users = new User();
        $users->nip = $nip;
        $users->nama_lengkap = $nama_lengkap;
        $users->id_bidang = $bidang;
        $users->password = $password;

        $users->save();

        return view('/user.pengguna');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    
    public function update(Request $request, $nip)
    {
        $users=User::find($nip);
        $users->nip=$request->nip;
        $users->level=$request->level;
        $users->nama_lengkap=$request->nama_lengkap;
        $users->id_bidang=$request->id_bidang;
        $users->save();

        return redirect('/user.pengguna');
    }

   
    public function destroy($nip)
    {
        $hapususers=User::where('nip',$nip)
        ->update(['status'=>'tidak aktif']);
        return view('/user.pengguna'); 
    }
}
