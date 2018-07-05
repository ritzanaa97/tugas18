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
                                <th class="text-center" style="width: 200px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;?>
                            @foreach ($supplier as $value)
                            @if($value->status!='tidak aktif')
                            <?php $no++ ;?>
                            <tr class="text-center">
                                <td>{{ $no }}</td>
                                <td>{{ $value->nama_supplier }}</td>
                                <td>{{ $value->alamat}}</td>
                                <td>
                                    <button class="btn btn-outline btn-primary btn-sm" data-toggle="modal" data-target="#ubahsupplier{{$value->id_supplier}}">
                                        <span class="glyphicon glyphicon-edit" data-toggle="#modal" data-target="#ubahsupplier">
                                        </span> Ubah
                                    </button>
                                    <button class="btn btn-outline btn-danger btn-sm" data-toggle="modal" data-target="#hapussupplier{{$value->id_supplier}}">
                                        <span class="glyphicon glyphicon-ban-circle" data-toggle="#modal" data-target="#hapussupplier">
                                        </span> Nonaktifkan
                                    </button>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    <!-- hapus user -->
                    <div id="hapussupplier{{$value->id_supplier}}" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">

                                <input type="hidden" name="method" value="DELETE">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">x</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Non-aktifkan Data Supplier</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Yakin menonaktifkan pengguna ini<span class="del-name" style="font-weight: bold;"></span>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{route('supplier.hapus',[$value->id_supplier]) }}" class="btn btn-md btn-success delete">Ya</a>
                                        <button data-dismiss="modal" class="btn btn-danger">Tidak</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- modal ubah supplier -->
                    <div class="modal fade" id="ubahsupplier{{$value->id_supplier}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Supplier Sistem Inventori</h4>
                                </div>
                                <form class="form-horizontal" method="POST" action="{{route('supplier.update',[$value->id_supplier]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama_supplier" class="col-md-4 control-label">Nama Supplier</label>

                                        <div class="col-md-6">
                                            <input id="nama_supplier" type="text" class="form-control" name="nama_supplier" value="{{ $value->nama_supplier }}" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="col-md-4 control-label">Alamat</label>

                                        <div class="col-md-6">
                                            <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $value->alamat }}" required autofocus>
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
