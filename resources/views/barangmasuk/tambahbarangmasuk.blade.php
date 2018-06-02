@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12">
        <h3 class="page-header text-center">Tambahkan transaksi barang masuk</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- tabel untuk simpan daftar barang -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                Masukkan barang masuk
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
                <div class="form-group">
                    <label for="jumlahbrgmsk" class="col-md-4 control-label">Jumlah Barang</label>

                    <div class="col-md-6">
                        <input id="jumlahbrgmsk" type="text" class="form-control jumlahbrgmsk" name="jumlahbrgmsk" required>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm tambahbrgmsk">Tambahkan</button>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<form class="form-horizontal" method="POST" action="{{ action('BarangmasukController@store') }}">
 {{ csrf_field() }}
<!-- tabel untuk satu transaksi -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                Daftar Transaksi Barang Masuk
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover">
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

<!-- modal untuk isi supplier dan tanggal masuk -->
<div class="modal fade" id="simpantransaksi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Masukkan Supplier dan Tanggal</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group{{ $errors->has('tanggal_masuk') ? ' has-error' : '' }}">
                    <label for="tanggal_masuk" class="col-md-4 control-label">Tanggal Masuk</label>

                    <div class="col-md-6">
                        <input id="tanggal_masuk" type="date" class="form-control" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" required autofocus>

                        @if ($errors->has('tanggal_masuk'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tanggal_masuk') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('supplier') ? ' has-error' : '' }}">
                    <label for="supplier" class="col-md-4 control-label">Pemasok</label>

                    <div class="col-md-6">

                        <select name="id_supplier" class="form-control">
                            <option selected disabled>Pilih Pemasok</option>
                            @foreach($supplier as $value)

                            <option value='{{$value->id_supplier}}'>{{$value->nama_supplier}}</option>

                            @endforeach
    
                        </select>

                        @if ($errors->has('supplier'))
                            <span class="help-block">
                                <strong>{{ $errors->first('supplier') }}</strong>
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
    $(".tambahbrgmsk").on('click', function(){
       var namabarang = $(".namabarang option:selected")
       var jumlahbrgmsk = $(".jumlahbrgmsk")
      if(namabarang.val() != "" && jumlahbrgmsk.val() != ""){
        var id_barang = namabarang.val()
        var nama_barang = namabarang.text()
        var jumlahbrgmsk = jumlahbrgmsk.val()
        $('#dataTables').append('<tr><td>'+id_barang+'<input name="id_barang[]" value="'+id_barang+'" style="display:none"></td><td>'+nama_barang+'<input name="nama_barang[]" value="'+nama_barang+'" style="display:none"></td><td>'+jumlahbrgmsk+'<input name="jumlahbrgmsk[]" value="'+jumlahbrgmsk+'" style="display:none"></td></tr>');
      }
    });
    // $(function(){
    //     $(#tanggal_masuk).datepicker({
    //         autoclose: true
    //     });
    // })
</script>
@endsection