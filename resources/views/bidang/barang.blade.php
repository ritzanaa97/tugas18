@extends('layouts.app')

@section('content')
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Master Data Barang</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
     <div class="row">
                <div class="col-lg-12">
                    <a href="#" type="button" class="btn btn-primary pull-right">Tambahkan</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Barang Inventori
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Kategori</th>
                                        <th>Total Barang</th>
                                    </tr>
                                        @foreach ($barang as $value)
                                    <tr>
                                        <th>{{ $value->nama_barang }}</th>
                                        <th>{{ $value->id_barang }}</th>
                                        <th>{{ $value->kategori }}</th>
                                        <th>{{ $value->jumlah }}</th>
                                    </tr>
                                        @endforeach
                                </thead>
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
