@extends('layouts.app')

@section('content')
@include('alert')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Daftar Serah Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form class="form-inline well well-sm col-md-8" action="{{ action('BarangkeluarController@index') }}">
    <label for="month" class="control-label">Lihat Laporan Bulanan per</label>
    <select class="form-control" id="month" name="month">
        <option value="" selected disabled>Pilih Bulan</option>
        <option value="01">Januari</option>
        <option value="02">Pebruari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">Nopember</option>
        <option value="12">Desember</option>
    </select>
    <select class="form-control" name="year">
        <option value="" selected disabled>Pilih Tahun</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
    </select>
    <input class="btn btn-info btn-sm" value="Lihat Laporan" type="submit">
</form>
<div class="row">
    <form action="{{ route('barangkeluar.export') }}" method="post" class="form-inline well well-sm pull-right">
        {{ csrf_field() }}
        @if(!empty($barangkeluar[0]->tanggal_serah))
        <input type="hidden" name="month" value="{{ date('m',strtotime ($barangkeluar[0]->tanggal_serah)) }}">
        @else
        <input type="hidden" name="month" value="0">
        @endif
        <input class="btn btn-info btn-sm" value="Export Laporan Bulan Terpilih" type="submit">
    </form>
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
                            <th class="text-center">Status Pengajuan</th>
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
                            <td>{{ date('d-m-Y',strtotime ($value->tanggal_serah)) }}</td>
                            <td>{{$value->nama_bidang}}</td>
                            <td>{{$value->status_pengajuan}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm pull-right" href="{{url('/detailbarangkeluar')}}/{{$value->id_pengajuanbrg}}"><i class="glyphicon glyphicon-eye-open"></i> Lihat Detail</a>
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