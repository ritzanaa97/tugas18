@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">Riwayat Pengajuan Barang</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <form class="form-inline well well-sm">
        <label for="month" class="control-label">Lihat Laporan Bulanan per</label>
        <select class="form-control" id="month" name="month">
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
            <option value="2017">2017</option>
            <option value="2018" selected="selected">2018</option>
        </select>
        <input class="btn btn-info btn-sm" value="Lihat Laporan" type="submit">
        <a class="btn btn-default btn-sm">Print Laporan Bulan Terpilih</a>
        <a class="btn btn-default btn-sm">Print Laporan Tahun Terpilih</a>
    </form>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">No. Pengajuan</th>
                                <th class="text-center">Tanggal Pengajuan</th>
                                <th class="text-center">Diajukan oleh</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
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
