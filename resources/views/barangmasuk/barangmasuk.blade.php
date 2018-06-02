@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Barang Masuk</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <a class="btn btn-primary btn-sm pull-right" href="{{url('\tambahbarangmasuk')}}">Tambahkan</a>
                <div class="panel-heading">
                    Transaksi Barang Masuk
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No Transaksi Masuk</th>
                                <th>Tanggal Masuk</th>
                                <th>Supplier</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangmasuk as $value)
                            <tr>
                                <td>{{ $value->id_brgmasuk }}</td>
                                <td>{{ $value->tanggal_masuk }}</td>
                                <td>{{ ($value->supplier)?$value->supplier->nama_supplier:'-' }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#">
                                    <span class="glyphicon glyphicon-edit" style="color:#FFFFFF" data-toggle="modal" data-target="#">
                                    </span> Lihat Detail
                                    </button>
                                </td>
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
    </div>
</div>
@endsection
