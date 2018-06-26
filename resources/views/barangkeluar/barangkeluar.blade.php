@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Barang Keluar</h1>
    </div>
 <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Daftar Barang yang telah didistribusikan ke Bidang
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No. Pengajuan</th>
                            <th class="text-center">Tanggal Serah</th>
                            <th class="text-center">Diserahkan ke Bidang</th>
                            <th class="text-center">Lihat Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach ($barangkeluar as $value)
                        @if($value->status_pengajuan!='proses')
                        <?php $no++ ;?>
                        <tr class="text-center">
                            <td>{{ $no }}</td>
                            <td>{{$value->id_pengajuanbrg}}</td>
                            <td>{{$value->tanggal_serah}}</td>
                            <td>{{$value->nama_bidang}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm pull-right" href="#"><i class="glyphicon glyphicon-eye-open"></i> Lihat Detail</a>
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