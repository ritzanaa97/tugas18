@extends('layouts.app')

@section('content')

<div class="row" style="padding-top: 50px; padding-right: 20px">
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
        <h5 style="padding-left: 50px; padding-top: 50px;">Nomor Transaksi:</h5>
    </div>
    <div class="col-lg-12">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Kode Barang</th>
                            <th style="width: 50px">Jumlah Pengajuan</th>
                            <th style="width: 50px">Jumlah Diberikan</th>
                            <th>Keterangan</th>
                            <th>Tanggal Serah</th>
                            <th>Sisa Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach($detailbarangkeluar as $value)
                        @if($value->status_pengajuan!='proses')
                        <?php $no++ ;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$value->nama_barang}}</td>
                            <td>{{$value->nama_satuan}}</td>
                            <td>{{$value->id_barang}}</td>
                            <td>{{$value->jumlahpengajuan}}</td>
                            <td>{{$value->jumlahserah}}</td>
                            <td>{{$value->keterangan_barang}}</td>
                            <td>{{ date('d-m-Y',strtotime ($value->tanggal_serah)) }}</td>
                            <td>{{$value->jumlahbarang}}</td>
                        </tr>
                        @endif
                        @endforeach
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
        <h5 class="text-center">{{Auth::user()->bidang->nama_bidang}}</h5>
    </div>
    <div class="col-md-4 text-center"><br>
        <h5 class="text-center">Yang menerima</h5>
        <br>
        <br>
        <br>
        <h5 class="text-center"></h5>
    </div>
    <div class="col-md-4 text-center"><br>
        <h5 class="text-center">Yang memberikan</h5>
        <br>
        <br>
        <br>
        <h5 class="text-center">{{Auth::user()->nama_lengkap}}</h5>
    </div>
</div>

@endsection