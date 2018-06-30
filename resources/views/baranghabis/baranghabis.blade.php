@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Daftar Belanja Barang</h1>
    </div>
 <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Daftar Barang yang akan habis di Gudang
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Barang</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Jenis Barang</th>
                            <th class="text-center">Jumlah Barang</th>
                            <th class="text-center">Isi Jumlah Beli</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach ($baranghabis as $value)
                        @if($value->jumlahbarang<10)
                        <?php $no++ ;?>
                        <tr class="text-center">
                            <td>{{ $no }}</td>
                            <td>{{ $value->id_barang }}</td>
                            <td>{{ $value->nama_barang }}</td>
                            <td>{{ $value->nama_jenisbarang }}</td>
                            <td>{{ $value->jumlahbarang }}</td>
                            <td>
                                <div>
                                    <input type="hidden" name="#" value="#">
                                    <input id="jumlahserah" type="text" min="0" class="form-control text-center" name="#" required autofocus>
                                </div>
                            </td>
                        @endif
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
@endsection