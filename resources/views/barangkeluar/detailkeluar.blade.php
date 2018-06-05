@extends('layouts.app')

@section('content')
<form class="form-inline well well-sm">
    <a class="btn btn-primary btn-sm pull-right""><i class="fa fa-print"></i> Print</a>


<div class="row">
    <div class="col-md-4 text-center"><br>
        <img style="width: 80px" src="{{url('inventoriadmin/dist/css/images/garuda.png')}}">
        <h5 class="text-center">BADAN KEPEGAWAIAN NEGARA</h5>
        <h5 class="text-center">Kantor Regional I</h5>
    </div>
    <div class="col-md-4"><br>
        <h4 class="text-center"><b>KANTOR REGIONAL I</b></h4>
        <h4 class="text-center"><b>BADAN KEPEGAWAIAN NEGARA</b></h4>
        <h4 class="text-center" style="padding-top: 25px"><b><u>DAFTAR BARANG KELUAR</u></b></h4>
    </div>
    <div class="col-md-4"><br>
        <br>
        <h5 style="padding-left: 50px; padding-top: 50px;">Nomor: 18060001</h5>
    </div>
    <div class="col-lg-12">
        <h5 style="padding-left: 50px; padding-top: 25px" > Tanggal Transaksi Barang Keluar: 30-05-2018</h5>
    </div>
    <div class="col-lg-12">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Supplier</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <div class="col-md-4 text-center"><br>
        <h5 class="text-center">Kepala</h5>
        <h5 class="text-center">Bidang/Bagian/Subbag/Seksi</h5>
        <br>
        <br>
        <h5 class="text-center">(nama user)</h5>
    </div>
    <div class="col-md-4 text-center"><br>
        <h5 class="text-center">Yang menerima</h5>
        <br>
        <br>
        <br>
        <h5 class="text-center">(nama user)</h5>
    </div>
    <div class="col-md-4 text-center"><br>
        <h5 class="text-center">Yang memberikan</h5>
        <br>
        <br>
        <br>
        <h5 class="text-center">(nama user)</h5>
        <h5 class="text-center">Tanggal: </h5>
    </div>
</div>
</form>
@endsection