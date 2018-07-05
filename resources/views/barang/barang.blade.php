@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Master Data Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="alert alert-info">
    Untuk Import Excel, Pastikan Data Jenis Barang sudah terdaftar! Silahkan cek link berikut untuk melihat Jenis Barang. <a href="{{url('/jenisbarang')}}" class="alert-link">Klik Disini</a>.
</div>
<form class="form-inline well well-sm pull-right" enctype="multipart/form-data" method="post" action="{{ action('BarangController@barangimport') }}">
    {{ csrf_field() }}
    <a class="btn btn-default btn-sm" href="{{ route('barang.export') }}"><i class="glyphicon glyphicon-export"></i> Export Laporan Excel</a>
    <input type="file" name="barangimport" class="btn btn-default btn-sm">
    <input type="submit" value="Import" class="btn btn-default btn-sm">
</form>
            
 <div class="row">
    <div class="col-lg-12">
        <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#tambahbarang"><i class="glyphicon glyphicon-plus"></i> Tambahkan</button>
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                Daftar barang
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Satuan</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                        <thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach ($barang as $value)
                        <?php $no++ ;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{ $value->id_barang }}</td>
                            <td>{{ $value->nama_barang }}</td>
                            <td>{{ ($value->jenisbarang)?$value->jenisbarang->nama_jenisbarang:''}}</td>
                            <td>{{ ($value->satuan)?$value->satuan->nama_satuan:'-' }}</td>
                            <td>{{ $value->jumlahbarang }}</td>
                            <td>
                                <button class="btn btn-outline btn-primary btn-sm" data-toggle="modal" data-target="#ubahbarang{{$value->id_barang}}">
                                <span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#ubahbarang">
                                </span> Edit
                                </button>
                            </td>
                        </tr>
                            @endforeach
                    </tbody>
                </table>

        @foreach ($barang as $value)
        <div class="modal fade" id="ubahbarang{{$value->id_barang}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Edit Barang</h4>
                    </div>
                        <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{route('barang.update',[$value->id_barang]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="id_barang" class="col-md-4 control-label">Kode Barang</label>

                                <div class="col-md-6">
                                    <input id="id_barang" type="text" class="form-control" name="id_barang" value="{{ $value->id_barang }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_barang" class="col-md-4 control-label">Nama Barang</label>

                                <div class="col-md-6">
                                    <input id="nama_barang" type="text" class="form-control" name="nama_barang" value="{{ $value->nama_barang }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenisbarang" class="col-md-4 control-label">Jenis Barang</label>

                                <div class="col-md-6">

                                    <select name="jenisbarang" class="form-control">
                                        <option value="" selected disabled>Pilih Jenis Barang</option>
                                        @foreach($jenisbarang as $nama_jenisbarang)

                                        <option @if($nama_jenisbarang->id_jenisbarang==$value->id_jenisbarang){{"selected"}}@endif value="{{$nama_jenisbarang->id_jenisbarang}}">{{$nama_jenisbarang->nama_jenisbarang}}</option>

                                        @endforeach
                
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jumlahbarang" class="col-md-4 control-label">Jumlah Barang</label>

                                <div class="col-md-6">
                                    <input id="jumlahbarang" type="text" class="form-control" name="jumlahbarang" value="{{ $value->jumlahbarang }}" required autofocus>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        @endforeach
        <!-- model tambah -->
        <div class="modal fade" id="tambahbarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Tambahkan Barang</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{ action('BarangController@store') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('id_barang') ? ' has-error' : '' }}">
                                <label for="id_barang" class="col-md-4 control-label">Kode Barang</label>

                                <div class="col-md-6">
                                    <input id="id_barang" type="text" class="form-control" name="id_barang" value="{{ old('id_barang') }}" required autofocus>

                                    @if ($errors->has('id_barang'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('id_barang') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('id_jenisbarang') ? ' has-error' : '' }}">
                                <label for="id_jenisbarang" class="col-md-4 control-label">Jenis Barang</label>
                                <div class="col-md-6">
                                    <select name="id_jenisbarang" class="form-control js-aset" style="width: 250px">
                                        <option value="" selected disabled>Pilih Jenis Barang</option>
                                        @foreach($jenisbarang as $value)
                                        <option value='{{$value->id_jenisbarang}}'>{{$value->nama_jenisbarang}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('nama_barang') ? ' has-error' : '' }}">
                                <label for="nama_barang" class="col-md-4 control-label">Nama Barang</label>

                                <div class="col-md-6">
                                    <input id="nama_barang" type="text" class="form-control" name="nama_barang" value="{{ old('nama_barang') }}" required autofocus>

                                    @if ($errors->has('nama_barang'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama_barang') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('id_satuan') ? ' has-error' : '' }}">
                                <label for="id_satuan" class="col-md-4 control-label">Satuan</label>

                                <div class="col-md-6">
                                    <select name="id_satuan" class="form-control">
                                        <option value="" selected disabled>Pilih Satuan</option>
                                        @foreach($satuan as $value)

                                        <option value='{{$value->id_satuan}}'>{{$value->nama_satuan}}</option>

                                        @endforeach
                
                                    </select>

                                    @if ($errors->has('satuan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('satuan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('jumlahbarang') ? ' has-error' : '' }}">
                                <label for="jumlahbarang" class="col-md-4 control-label">Jumlah Barang</label>

                                <div class="col-md-6">
                                    <input id="jumlahbarang" type="text" class="form-control" name="jumlahbarang" value="{{ old('jumlahbarang') }}" required autofocus>

                                    @if ($errors->has('jumlahbarang'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('jumlahbarang') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    </div> 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection
