@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Master Data Supplier</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
            
     <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                    <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#tambahsupplier"><i class="glyphicon glyphicon-plus"></i> Tambahkan</button>
                <div class="panel-heading text-center">
                    Data Supplier
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px">No</th>
                                <th class="text-center">Nama Supplier</th>
                                <th class="text-center">Alamat Supplier</th>
                                <th class="text-center" style="width: 10px">Ubah</th>
                                <th class="text-center" style="width: 10px">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;?>
                            @foreach ($supplier as $value)
                            <?php $no++ ;?>
                            <tr class="text-center">
                                <td>{{ $no }}</td>
                                <td>{{ $value->nama_supplier }}</td>
                                <td>{{ $value->alamat}}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#">
                                        <span class="glyphicon glyphicon-edit" style="color:#FFFFFF" data-toggle="#modal" data-target="#">
                                        </span> Ubah
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#hapususer{{$value->nip}}">
                                        <span class="glyphicon glyphicon-trash" style="color:#FFFFFF" data-toggle="#modal" data-target="#hapususer">
                                        </span> Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- model tambah -->
                    <div class="modal fade" id="tambahsupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title text-center" id="myModalLabel">Tambahkan Supplier</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" method="POST" action="{{ action('SupplierController@store') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('nama_supplier') ? ' has-error' : '' }}">
                                            <label for="nama_supplier" class="col-md-4 control-label">Nama Supplier</label>

                                            <div class="col-md-6">
                                                <input id="nama_supplier" type="text" class="form-control" name="nama_supplier" value="{{ old('nama_supplier') }}" required autofocus>

                                                @if ($errors->has('nama_supplier'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('nama_supplier') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                                            <label for="alamat" class="col-md-4 control-label">Alamat Supplier</label>

                                            <div class="col-md-6">
                                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required autofocus>

                                                @if ($errors->has('alamat'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('alamat') }}</strong>
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
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection
