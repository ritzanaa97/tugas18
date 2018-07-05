@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12">
        <h3 class="page-header text-center">Pengajuan Barang</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- tabel untuk simpan daftar barang -->
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                Isikan form pengajuan barang
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="form-group">
                    <label for="barang" class="col-md-4 control-label">Nama Barang</label>
                    <div class="col-md-6">
                        <select class="form-control js-aset" name="barang">
                            <option value="" selected disabled>Pilih Barang</option>
                            @foreach($barang as $value)
                            <option value="{{$value->id_barang}}">{{$value->nama_barang}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="jumlahpengajuan" class="col-md-4 control-label">Jumlah Barang</label>

                    <div class="col-md-6">
                        <input id="jumlahpengajuan" type="text" class="form-control jumlahpengajuan" name="jumlahpengajuan" required>
                    </div>
                </div>
            </div>
            <!-- @if($value->jumlahpengajuan<10)
            <p class="text-danger text-center">Barang yang anda pilih akan habis di Gudang. Sisa digudang: #</p>
            @endif -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm tambahpengajuan">Tambahkan</button>
            </div>
        </div>
    </div>

    <form class="form-horizontal" method="POST" action="{{ action('PengajuanbarangController@store') }}">
     {{ csrf_field() }}
    <!-- tabel untuk satu transaksi -->

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                Daftar Transaksi Barang Keluar
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" id="pengajuan" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Yang Diminta</th>
                        </tr>
                    </thead>
                    <tbody id="dataTables">

                    </tbody>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-send"></i> Ajukan</button> 
                        <!-- <a class="btn btn-primary btn-sm" onclick="ajukan()">Ajukan </a> -->
                    </div>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>
<!-- modal untuk isi bidang dan tanggal transaksi -->
</form>

@endsection
@section('jsscript')
<script type="text/javascript">
    $(".tambahpengajuan").on('click', function(){
       var namabarang = $(".js-aset option:selected")
       var jumlahpengajuan = $(".jumlahpengajuan")
      if(namabarang.val() != "" && jumlahpengajuan.val() != ""){
        var id_barang = namabarang.val()
        var nama_barang = namabarang.text()
        var jumlahpengajuan = jumlahpengajuan.val()
        $('#dataTables').append('<tr><td>'+id_barang+'<input name="id_barang[]" value="'+id_barang+'" style="display:none"></td><td>'+nama_barang+'<input name="nama_barang[]" value="'+nama_barang+'" style="display:none"></td><td>'+jumlahpengajuan+'<input name="jumlahpengajuan[]" value="'+jumlahpengajuan+'" style="display:none"></td></tr>');
      }
    });
    // $(function(){
    //     $(#tanggal_masuk).datepicker({
    //         autoclose: true
    //     });
    // })
$('js-aset').select2();
</script>
@endsection