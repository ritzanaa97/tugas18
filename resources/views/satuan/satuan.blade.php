@extends('layouts.app')

@section('content')
@include('alert')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Data Satuan Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-md-6 text-center">
        <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#MyModal"><i class="glyphicon glyphicon-plus"></i> Tambahkan</button>
        <div class="panel panel-default">
            @include('alert')
            <div class="panel-heading text-center">
                Data Satuan Barang
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="satuan table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Satuan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach ($satuan as $value)
                        <?php $no++ ;?>
                        <tr >
                            <td>{{ $no }}</td>
                            <td>{{ $value->nama_satuan }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ubahsatuan{{$value->id_satuan}}">
                                    <span class="glyphicon glyphicon-edit" data-toggle="#modal" data-target="#ubahsatuan">
                                    </span> Ubah
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- model tambah -->
                <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title text-center" id="myModalLabel">Tambahkan Satuan Barang</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="POST" action="{{ route('tambahsatuan') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('nama_satuan') ? ' has-error' : '' }}">
                                        <label for="nama_satuan" class="col-md-4 control-label">Nama Satuan</label>

                                        <div class="col-md-6">
                                            <input id="nama_satuan" type="text" class="form-control" name="nama_satuan" value="{{ old('nama_satuan') }}" required autofocus>

                                            @if ($errors->has('nama_satuan'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nama_satuan') }}</strong>
                                            </span>
                                            @endif
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
                <!-- modal edit -->
                @foreach($satuan as $value)
                <div class="modal fade" id="ubahsatuan{{$value->id_satuan}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title text-center" id="myModalLabel">Tambahkan Satuan Barang</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="POST" action="{{route('satuan.update',[$value->id_satuan]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label for="nama_satuan" class="col-md-4 control-label">Nama Satuan</label>

                                        <div class="col-md-6">
                                            <input id="nama_satuan" type="text" class="form-control" name="nama_satuan" value="{{ $value->nama_satuan }}" required autofocus>
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
                </div>
                @endforeach
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection