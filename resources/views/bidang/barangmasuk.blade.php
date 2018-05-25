@extends('layouts.kabid')

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
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Katerogi</th>
                                <th>Tanggal Masuk</th>
                                <th>Keterangan</th>
                                <th>Jumlah Masuk</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
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
