@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Barang Masuk</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    Pastikan nama supplier sudah terdaftar pada Sistem. Silahkan cek link berikut. <a href="{{url('/supplier')}}" class="alert-link">Klik Disini</a>.
</div>
<form class="form-inline well well-sm col-md-6" action="{{ action('BarangmasukController@index') }}">
    <label for="month" class="control-label">Lihat Laporan per</label>
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
    <form action="{{ route('barangmasuk.export') }}" method="post" class="form-inline well well-sm pull-right">
        {{ csrf_field() }}
        @if(!empty($barangmasuk[0]->tanggal_masuk))
        <input type="hidden" name="bulan" value="{{ date('m',strtotime ($barangmasuk[0]->tanggal_masuk)) }}">
        @else
        <input type="hidden" name="bulan" value="0">
        @endif
        <input class="btn btn-info btn-sm" value="Export Laporan Bulan Terpilih" type="submit">
        
        @if(!empty($barangmasuk[0]->tanggal_masuk))
        <input type="hidden" name="tahun" value="{{ date('Y',strtotime ($barangmasuk[0]->tanggal_masuk)) }}">
        @else
        <input type="hidden" name="tahun" value="0">
        @endif
        <input class="btn btn-info btn-sm" value="Export Laporan Tahun Terpilih" type="submit">
    </form>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <a class="btn btn-primary btn-sm pull-right" href="{{url('\tambahbarangmasuk')}}"><i class="glyphicon glyphicon-plus"></i> Tambahkan</a>
            <div class="panel-heading text-center">
                Transaksi Barang Masuk
            </div>
            <!-- /.panel-heading -->

            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Transaksi Masuk</th>
                            <th class="text-center">Tanggal Masuk</th>
                            <th class="text-center">Pemasok</th>
                            <th class="text-center">Aksi</th>
                            <!-- <th class="text-center">Print</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach ($barangmasuk as $value)
                        <?php $no++ ;?>
                        <tr class="text-center">
                            <td>{{ $no }}</td>
                            <td>{{ $value->id_brgmasuk }}</td>
                            <td>{{ date('d-m-Y',strtotime ($value->tanggal_masuk)) }}</td>
                            <td>{{ $value->nama_supplier }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm pull-right" href="{{url('/detailbarangmasuk')}}/{{$value->id_brgmasuk}}"><i class="glyphicon glyphicon-eye-open"></i> Lihat Detail</a>
                            </td>
                                <!-- <td>
                                    <a class="btn btn-primary btn-sm pull-right" href="{{url('/print')}}/{{$value->id_brgmasuk}}"><i class="glyphicon glyphicon-eye-open"></i> Print</a>
                                </td> -->
                            </tr>
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
