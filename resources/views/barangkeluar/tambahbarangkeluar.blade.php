@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12">
        <h3 class="page-header text-center">Tambahkan transaksi barang keluar</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- tabel untuk simpan daftar barang -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                Masukkan barang Keluar
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
                    <label for="jumlahbrgkeluar" class="col-md-4 control-label">Jumlah Barang</label>

                    <div class="col-md-6">
                        <input id="jumlahbrgkeluar" type="text" class="form-control jumlahbrgkeluar" name="jumlahbrgkeluar" required>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm tambahbrgkeluar">Tambahkan</button>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<form class="form-horizontal" method="POST" action="{{ action('BarangkeluarController@store') }}">
 {{ csrf_field() }}
<!-- tabel untuk satu transaksi -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                Daftar Transaksi Barang Keluar
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                        </tr>
                    </thead>
                    <tbody id="dataTables">

                    </tbody>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-sm">Reset</button>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#simpantransaksi">Simpan
                        </button>
                    </div>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>

<!-- modal untuk isi bidang dan tanggal keluar -->
<div class="modal fade" id="simpantransaksi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Masukkan Bidang dan Tanggal</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group{{ $errors->has('tanggal_keluar') ? ' has-error' : '' }}">
                    <label for="tanggal_keluar" class="col-md-4 control-label">Tanggal Masuk</label>

                    <div class="col-md-6">
                        <input id="tanggal_keluar" type="date" class="form-control" name="tanggal_keluar" value="{{ old('tanggal_keluar') }}" required autofocus>

                        @if ($errors->has('tanggal_keluar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tanggal_keluar') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('bidang') ? ' has-error' : '' }}">
                    <label for="bidang" class="col-md-4 control-label">Bidang</label>

                    <div class="col-md-6">

                        <select name="id_bidang" class="form-control">
                            <option selected disabled>Pilih Bidang</option>
                            @foreach($bidang as $value)

                            <option value='{{$value->id_bidang}}'>{{$value->nama_bidang}}</option>

                            @endforeach
    
                        </select>

                        @if ($errors->has('bidang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bidang') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

</form>

@endsection
@section('jsscript')
<script type="text/javascript">
    $(".tambahbrgkeluar").on('click', function(){
       var namabarang = $(".namabarang option:selected")
       var jumlahbrgkeluar = $(".jumlahbrgkeluar")
      if(namabarang.val() != "" && jumlahbrgkeluar.val() != ""){
        var id_barang = namabarang.val()
        var nama_barang = namabarang.text()
        var jumlahbrgkeluar = jumlahbrgkeluar.val()
        $('#dataTables').append('<tr><td>'+id_barang+'<input name="id_barang[]" value="'+id_barang+'" style="display:none"></td><td>'+nama_barang+'<input name="nama_barang[]" value="'+nama_barang+'" style="display:none"></td><td>'+jumlahbrgkeluar+'<input name="jumlahbrgkeluar[]" value="'+jumlahbrgkeluar+'" style="display:none"></td></tr>');
      }
    });
    // $(function(){
    //     $(#tanggal_masuk).datepicker({
    //         autoclose: true
    //     });
    // })
</script>
@endsection