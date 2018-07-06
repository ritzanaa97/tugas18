@extends('layouts.app')

@section('content')
@if(Auth::user()->status == 'aktif')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Beranda</h1>
    </div>

    <!-- panel untuk 'selamat datang' -->
    <div class="col-lg-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                Selamat Datang <b>{{Auth::user()->nama_lengkap}}</b> di Sistem Inventory dan Pengajuan Barang
            </div>
        </div>
        <!-- /.col-lg-4 -->
    </div>
</div>

@if(Auth::user()->level == 'admin')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            {{count($pengajuanbarang)}}
                        </div>
                        <div>Pengajuan Barang</div>
                    </div>
                </div>
            </div>
            <a href="{{url('/daftar')}}">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-save fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{count($barangmasuk)}}</div>
                        <div>Barang Masuk</div>
                    </div>
                </div>
            </div>
            <a href="{{url('/barangmasuk')}}">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-open fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{count($serahbarang)}}</div>
                        <div>Serah Barang</div>
                    </div>
                </div>
            </div>
            <a href="{{url('/barangkeluar')}}">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-cubes fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"></div>
                        <div>Cek Stok Barang</div>
                    </div>
                </div>
            </div>
            <a href="{{url('/barang')}}">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-danger">
            <div class="panel-heading text-center">
                <b>Barang yang akan habis</b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr class="danger">
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Barang</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Jenis Barang</th>
                            <th class="text-center">Satuan</th>
                            <th class="text-center">Jumlah Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach ($barang as $value)
                        @if($value->jumlahbarang < '10')
                        <?php $no++ ;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{ $value->id_barang }}</td>
                            <td>{{ $value->nama_barang }}</td>
                            <td>{{ ($value->jenisbarang)?$value->jenisbarang->nama_jenisbarang:''}}</td>
                            <td>{{ ($value->satuan)?$value->satuan->nama_satuan:'-' }}</td>
                            <td>{{ $value->jumlahbarang }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <b>Bidang yang sering melakukan Pengajuan Barang</b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Bidang</th>
                            <th class="text-center">Total Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach ($urutbidang as $value)
                        <?php $no++ ;?>
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $value->nama_bidang }}</td>
                            <td>{{ count($value->totalpengajuan) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->

    <div class="col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <b>Barang yang sering diajukan oleh Bidang</b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Barang</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Jenis Barang</th>
                            <th class="text-center">Jumlah Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endif
@if(Auth::user()->level == 'bidang')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-save fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">#</div>
                        <div>Pengajuan Selesai</div>
                    </div>
                </div>
            </div>
            <a href="{{url('/terimabarang')}}">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-open fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{count($serahbarang)}}</div>
                        <div>Pengajuan di Proses</div>
                    </div>
                </div>
            </div>
            <a href="{{url('/riwayat')}}">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-cubes fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"></div>
                        <div>Cek Stok Barang</div>
                    </div>
                </div>
            </div>
            <a href="{{url('/barang')}}">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-danger">
            <div class="panel-heading text-center">
                <b>Stok Barang yang Hampir Habis di Gudang</b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr class="danger">
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Barang</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Jenis Barang</th>
                            <th class="text-center">Satuan</th>
                            <th class="text-center">Jumlah Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach ($barang as $value)
                        @if($value->jumlahbarang < '10')
                        <?php $no++ ;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{ $value->id_barang }}</td>
                            <td>{{ $value->nama_barang }}</td>
                            <td>{{ ($value->jenisbarang)?$value->jenisbarang->nama_jenisbarang:''}}</td>
                            <td>{{ ($value->satuan)?$value->satuan->nama_satuan:'-' }}</td>
                            <td>{{ $value->jumlahbarang }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                Barang yang sering diajukan oleh {{Auth::user()->bidang->nama_bidang}}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Barang</th>
                            <th class="text-center">Jenis Barang</th>
                            <th class="text-center">Jumlah Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endif
@else
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center"><b>Maaf, akun yang anda masukkan sudah tidak aktif. Silahkan
        gunakan akun yang lain.</b></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
@endif
@endsection
