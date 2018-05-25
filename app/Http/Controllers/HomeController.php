<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }
    public function barang()
    {
        return view('admin.barang');
    }
    public function barangmasuk()
    {
        return view('admin.barangmasuk');
    }
    public function barangkeluar()
    {
        return view('admin.barangkeluar');
    }
    public function pengguna()
    {
        return view('admin.pengguna');
    }
        public function pengajuanbarang()
    {
        return view('admin.pengajuanbarang');
    }
}
