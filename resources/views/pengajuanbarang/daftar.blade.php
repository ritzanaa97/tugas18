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
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Yang Mengajukan</th>
                            <th class="text-center">Bidang</th>
                            <th class="text-center">Lihat Detail</th>
                            <th class="text-center" style="width: 130px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach ($pengajuanbarang as $value)
                        <?php $no++ ;?>
                        <tr class="text-center">
                            <td>{{ $no }}</td>
                            <td>{{$value->id_pengajuanbrg}}</td>
                            <td>{{$value->tanggal_pengajuan}}</td>
                            <td>{{$value->nama_lengkap}}</td>
                            <td>{{$value->nama_bidang}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="#"><i class="glyphicon glyphicon-eye-open"></i> Lihat Detail</a>
                        </td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{url('/serahbarang')}}/{{$value->id_pengajuanbrg}}"><i class="glyphicon glyphicon-check"></i> Terima</a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#tolakpengajuan">
                                <span class="fa fa-times" style="color:#FFFFFF" data-toggle="#modal" data-target="#tolakpengajuan">
                                </span> Tolak
                            </button>
                        </td>
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


<!-- modal untuk tolak pengajuan barang -->
<div class="modal fade" id="tolakpengajuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Isikan Keterangan Pengajuan ditolak</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-md-4">Keterangan</label>
                        <textarea class="col-md-4 form-control" rows="3"></textarea>
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
</div>
@endsection