@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Barang yang belum diserahkan</h1>
    </div>
 <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Daftar Barang Pengajuan yang belum diserahkan ke Bidang
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No. Pengajuan</th>
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Yang Mengajukan</th>
                            <th class="text-center">Bidang</th>
                            <th class="text-center">Lihat Detail</th>
                            <th class="text-center" style="width: 130px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                            <td>#</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="#"><i class="glyphicon glyphicon-eye-open"></i> Lihat Detail</a>
                        </td>
                        <td>
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#serahkanbarang">
                                <span class="glyphicon glyphicon-send" style="color:#FFFFFF" data-toggle="#modal" data-target="#serahkanbarang">
                                </span> Serahkan Barang
                            </button>
                        </td>
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
<div class="modal fade" id="serahkanbarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Isikan jumlah barang yang diberikan</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="">
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
                    <div class="form-group{{ $errors->has('jumlahpengajuan') ? ' has-error' : '' }}">
                        <label for="jumlahpengajuan" class="col-md-4 control-label">Jumlah Pengajuan</label>

                        <div class="col-md-4">
                            <input id="jumlahpengajuan" type="text" class="form-control" name="jumlahpengajuan" value="{{ old('jumlahpengajuan') }}" required autofocus>

                            @if ($errors->has('jumlahpengajuan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('jumlahpengajuan') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('jumlahserahbarang') ? ' has-error' : '' }}">
                        <label for="jumlahserahbarang" class="col-md-4 control-label">Jumlah Diberikan</label>

                        <div class="col-md-4">
                            <input id="jumlahserahbarang" type="text" class="form-control" name="jumlahserahbarang" value="{{ old('jumlahserahbarang') }}" required autofocus>

                            @if ($errors->has('jumlahserahbarang'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('jumlahserahbarang') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
</div>
@endsection