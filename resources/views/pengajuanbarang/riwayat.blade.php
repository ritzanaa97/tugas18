@extends('layouts.app')

@section('content')
@include('alert')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Daftar Pengajuan Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                Daftar Pengajuan barang yang masih di proses
            </div>
            <!-- /.panel-heading -->

            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center" style="width: 150px">No. Pengajuan</th>
                            <th class="text-center" style="width: 150px">Tanggal Pengajuan</th>
                            <th class="text-center">Diajukan oleh</th>
                            <th class="text-center">Bidang</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach ($pengajuanbarang as $value)
                        @if($value->status_pengajuan!='selesai')
                        <?php $no++ ;?>
                        <tr class="text-center">
                            <td>{{ $no }}</td>
                            <td>{{ $value->id_pengajuanbrg }}</td>
                            <td>{{ date('d-m-Y',strtotime ($value->tanggal_pengajuan)) }}</td>
                            <td>{{ $value->nama_lengkap }}</td>
                            <td>{{ $value->nama_bidang }}</td> 
                            <td>{{ $value->status_pengajuan }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm pull-right" href="{{url('/lihatdetail')}}/{{$value->id_pengajuanbrg}}"><i class="glyphicon glyphicon-eye-open"></i> Lihat Detail</a>
                            </td>
                        </tr>
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
</div>
@endsection
