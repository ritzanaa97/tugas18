@extends('layouts.app')

@section('content')

<div class="row" style="padding-top: 50px; padding-right: 20px">
<a class="btn btn-primary btn-sm pull-right"><i class="fa fa-print"></i> Print</a>
    <div class="col-md-4 text-center"><br>
        <img style="width: 80px" src="{{url('inventoriadmin/dist/css/images/garuda.png')}}">
        <h5 class="text-center">BADAN KEPEGAWAIAN NEGARA</h5>
        <h5 class="text-center">Kantor Regional I</h5>
    </div>
    <div class="col-md-4"><br>
        <h4 class="text-center"><b>KANTOR REGIONAL I</b></h4>
        <h4 class="text-center"><b>BADAN KEPEGAWAIAN NEGARA</b></h4>
        <h4 class="text-center" style="padding-top: 25px"><b><u>DAFTAR BARANG MASUK</u></b></h4>
    </div>
    <div class="col-md-4"><br>
        <br>
        <h5 style="padding-left: 50px; padding-top: 50px;">Nomor:</h5>
    </div>
    <div class="col-lg-12">
        <h5 style="padding-left: 50px; padding-top: 25px" > Tanggal Transaksi Barang Masuk:</h5>
    </div>
    <div class="col-lg-12">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Jumlah Barang</th>
                            <th>Supplier</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach($detailtransaksi as $value)
                        <?php $no++ ;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$value->id_barang}}</td>
                            <td>{{$value->nama_barang}}</td>
                            <td>{{$value->nama_satuan}}</td>
                            <td>{{$value->jumlahbrgmsk}}</td>
                            <td>{{$value->nama_supplier}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <div class="col-md-6 text-center"><br>
        <h5 class="text-center">Kepala</h5>
        <h5 class="text-center" style="padding-bottom: 100px">Bidang/Bagian/Subbag/Seksi</h5><br>
        <h5 class="text-center">{{Auth::user()->bidang->nama_bidang}}</h5>
    </div>
  
    <div class="col-md-6 text-center"><br><br>
        <h5 class="text-center" style="padding-bottom: 100px">Yang Menerima</h5><br>
        <h5 class="text-center">{{Auth::user()->nama_lengkap}}</h5>
    </div>
</div>

@endsection