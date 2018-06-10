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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.dashboard');
    }
    public function barang()
    {
        return view('barang.barang');
    }
    public function barangmasuk()
    {
        return view('barangmasuk.barangmasuk');
    }
    public function barangkeluar()
    {
        return view('barangkeluar.barangkeluar');
    }
    public function pengguna()
    {
        return view('admin.pengguna');
    }
        public function pengajuanbarang()
    {
        return view('pengajuanbarang.pengajuanbarang');
    }
}
