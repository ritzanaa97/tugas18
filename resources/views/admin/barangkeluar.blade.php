@extends('layouts.app')

@section('content')
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-center">Barang Keluar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#tambahbrgkeluar">Tambahkan</button>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Laporan Transaksi Barang Keluar
                </div>
                <!-- /.panel-heading -->
                 <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No. Transaksi</th>
                                <th>Lihat Detail</th>
                                <th>Tanggal Keluar</th>
                                <th>Jumlah Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangkeluar as $value)
                            <tr>
                                <td>{{ $value->id_brgkeluar }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#">
                                    <span class="glyphicon glyphicon-edit" style="color:#FFFFFF" data-toggle="modal" data-target="#">
                                    </span> Edit
                                    </button>
                                </td>
                                <td>{{ ($value->brgkeluar)?$value->brgkeluar->tanggal_keluar:'-' }}</td>
                                <td>{{ $value->jumlah_brgkeluar }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#">
                                    <span class="glyphicon glyphicon-edit" style="color:#FFFFFF" data-toggle="modal" data-target="#">
                                    </span> Edit
                                    </button>
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                    <div class="modal fade" id="tambahbrgkeluar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Tambahkan Transaksi Barang Masuk</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" method="POST" action="{{ route('barang_keluar') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('id_brgkeluar') ? ' has-error' : '' }}">
                                            <label for="id_brgkeluar" class="col-md-4 control-label">No. Transaksi</label>

                                            <div class="col-md-6">
                                                <input id="id_brgkeluar" type="text" class="form-control" name="id_brgkeluar" value="{{ old('id_brgkeluar') }}" required autofocus>

                                                @if ($errors->has('id_brgkeluar'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('id_brgkeluar') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

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

                                        <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                                            <label for="kategori" class="col-md-4 control-label">Kategori</label>

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

                                        <div class="form-group{{ $errors->has('tanggal_keluar') ? ' has-error' : '' }}">
                                            <label for="tanggal_keluar" class="col-md-4 control-label">Tanggal Masuk</label>

                                            <div class="col-md-6">
                                                <input id="tanggal_keluar" type="text" class="form-control" name="tanggal_keluar" value="{{ old('tanggal_keluar') }}" required autofocus>

                                                @if ($errors->has('tanggal_keluar'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('tanggal_keluar') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                                            <label for="keterangan" class="col-md-4 control-label">Keterangan</label>

                                            <div class="col-md-6">
                                                <input id="keterangan" type="text" class="form-control" name="keterangan" value="{{ old('keterangan') }}" required autofocus>

                                                @if ($errors->has('keterangan'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
                                            <label for="jumlah" class="col-md-4 control-label">Jumlah Masuk</label>

                                            <div class="col-md-6">
                                                <input id="jumlah" type="text" class="form-control" name="jumlah" value="{{ old('jumlah') }}" required autofocus>

                                                @if ($errors->has('jumlah'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('jumlah') }}</strong>
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
    @endforeach
@endsection