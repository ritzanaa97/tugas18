@extends('layouts.app')

@section('content')
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
                        <th class="text-center" style="width: 50px">Jumlah Pengajuan</th>
                        <th class="text-center" style="width: 50px">Jumlah Diberikan</th>
                        <th class="text-center" style="width: 50px">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <form class="form-horizontal" method="POST" action="{{ url('/simpanserah') }}">
                {{ csrf_field() }}
                    <?php $no = 0;?>
                    @foreach($serahbarang as $value)
                    <?php $no++ ;?>
                    <tr class="text-center">
                        <td>{{$no}}</td>
                        <td>{{$value->id_barang}}</td>
                        <td>{{$value->nama_barang}}</td>
                        <td>{{$value->nama_satuan}}</td>
                        <td>{{$value->jumlahpengajuan}}</td>
                        <td>

                            <div>
                                <input type="hidden" name="id_detailpengajuanbrg[]" value="{{$value->id_detailpengajuanbrg}}">
                                <input id="jumlahserah" type="text" min="0" class="form-control text-center" name="jumlahserah[]" required autofocus>
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