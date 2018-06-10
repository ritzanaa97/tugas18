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
                <div class="form-group{{ $errors->has('barang') ? ' has-error' : '' }}">
                    <label for="barang" class="col-md-4 control-label">Pilih Barang</label>

                    <div class="col-md-6">

                        <select name="barang" class="form-control namabarang">
                            <option value="" selected disabled>Pilih Barang</option>
                            @foreach($barang as $value)

                            <option value='{{$value->id_barang}}'>{{$value->nama_barang}}</option>

                            @endforeach
    
                        </select>

                        @if ($errors->has('id_barang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_barang') }}</strong>
                            </span>
                        @endif
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
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm tambahpengajuan">Tambahkan</button>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<form class="form-horizontal" method="POST" action="{{ action('PengajuanbarangController@index') }}">
 {{ csrf_field() }}
<!-- tabel untuk satu transaksi -->
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                Daftar Transaksi Barang Keluar
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Jumlah Yang Diminta</th>
                            <th>Satuan</th>
                            <th>Nama Barang</th>
                        </tr>
                    </thead>
                    <tbody id="dataTables">

                    </tbody>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-sm">Print Form</button>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#">Ajukan
                        </button>
                    </div>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>

</form>

@endsection
@section('jsscript')
<script type="text/javascript">
    $(".tambahpengajuan").on('click', function(){
       var namabarang = $(".namabarang option:selected")
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
</script>
@endsection