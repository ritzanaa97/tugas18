@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Daftar Pengajuan Barang</h1>
    </div>
 <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Daftar Pengajuan Barang yang diisi oleh Bidang
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No. Pengajuan</th>
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
                            <td>
                                <a class="btn btn-primary btn-sm" href="#"><i class="glyphicon glyphicon-eye-open"></i> Lihat Detail</a>
                            </td>
                            <td>
                                <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i> Terima</a>
                                <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-times"></i> Tolak</a>
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
@endsection