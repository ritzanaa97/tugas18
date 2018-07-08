@extends('layouts.app')

@section('content')
@include('alert')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Serah Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                Isikan jumlah barang yang diberikan ke bidang
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px">No.</th>
                            <th class="text-center" style="width: 50px">Kode Barang</th>
                            <th class="text-center" style="width: 100px">Nama Barang</th>
                            <th class="text-center" style="width: 50px">Satuan</th>
                            <th class="text-center" style="width: 50px">Jumlah di Gudang</th>
                            <th class="text-center" style="width: 50px">Jumlah Pengajuan</th>
                            <th class="text-center" style="width: 50px">Jumlah Diberikan</th>
                            <th class="text-center" style="width: 50px">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form class="form-horizontal" method="POST" action="{{ url('/simpanserah') }}" data-toggle="validator" role="form">
                            {{ csrf_field() }}
                            <?php $no = 0;?>
                            @foreach($serahbarang as $value)
                            <?php $no++ ;?>
                            <tr>
                                <td class="text-center">{{$no}}</td>
                                <td class="text-center">{{$value->id_barang}}</td>
                                <td class="text-center">{{$value->nama_barang}}</td>
                                <td class="text-center">{{$value->nama_satuan}}</td>
                                <td class="text-center">{{$value->jumlahbarang}}</td>
                                <td class="text-center">{{$value->jumlahpengajuan}}</td>
                                <td class="text-center">
                                    <div>
                                        <input type="hidden" name="id_detailpengajuanbrg[]" value="{{$value->id_detailpengajuanbrg}}">
                                        <input id="jumlahserah" type="number" min="0" max="{{$value->jumlahpengajuan}}" class="form-control text-center" name="jumlahserah[]" required autofocus>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <textarea id="keterangan_barang" type="text" class="form-control text-center" name="keterangan_barang[]">
                                        </textarea>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary btn-sm pull-right"> Simpan</button> 
                </form >
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection