@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Master Data Jenis Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="alert alert-info">
    Untuk Import Excel, Pastikan Data Kolom Jenis Barang memiliki format: <b>Nama Jenis Barang dan Kategori! </b>
</div>

<form class="form-inline well well-sm pull-right" enctype="multipart/form-data" method="post" action="{{ action('JenisbarangController@jenisbarangimport') }}">
    {{ csrf_field() }}
    <a class="btn btn-default btn-sm" href="{{ route('jenisbarang.export') }}"><i class="glyphicon glyphicon-export"></i> Export Laporan Excel</a>
    <input type="file" name="jenisbarangimport" class="btn btn-default btn-sm">
    <input type="submit" value="Import" class="btn btn-default btn-sm">
</form>
            
<div class="row">
<div class="col-lg-12">
    <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#tambahjenis"><i class="glyphicon glyphicon-plus"></i> Tambahkan</button>
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Daftar data jenis barang
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Jenis Barang</th>
                        <th>Nama Jenis Barang</th>
                        <th>Kategori</th>
                        <!-- <th>Aksi</th> -->
                    </tr>
                    <thead>
                <tbody>
                    <?php $no = 0;?>
                    @foreach ($jenisbarang as $value)
                    <?php $no++ ;?>
                    <tr>
                        <td class="text-center">{{$no}}</td>
                        <td>{{ $value->id_jenisbarang }}</td>
                        <td>{{ $value->nama_jenisbarang }}</td>
                        <td>{{ $value->kategori }}</td>
                        <!-- <td>
                            <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="updatejb">
                            <span class="glyphicon glyphicon-edit" style="color:#FFFFFF" data-toggle="modal" data-target="updatejb">
                            </span> Edit
                            </button>
                        </td> -->
                    </tr>
                        @endforeach
                </tbody>
            </table>

<!-- model tambah -->
<div class="modal fade" id="tambahjenis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Tambahkan Barang</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ action('JenisbarangController@store') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('id_jenisbarang') ? ' has-error' : '' }}">
                        <label for="nama_jenisbarang" class="col-md-4 control-label">Nama Jenis Barang</label>

                        <div class="col-md-6">
                            <input id="nama_jenisbarang" type="text" class="form-control" name="nama_jenisbarang" value="{{ old('nama_jenisbarang') }}" required autofocus>

                            @if ($errors->has('nama_jenisbarang'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama_jenisbarang') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                        <label for="kategori" class="col-md-4 control-label">Pilih Kategori</label>

                        <div class="col-md-6">
                            <select name="kategori" class="form-control kategori" >
                                <option value="art">Alat Rumah Tangga</option>
                                <option value="atk">Alat Tulis Kantor</option>
                            </select>

                            @if ($errors->has('kategori'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kategori') }}</strong>
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
