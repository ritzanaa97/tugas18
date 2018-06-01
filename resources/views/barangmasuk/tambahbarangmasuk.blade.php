@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12">
        <h3 class="page-header text-center">Tambahkan transaksi barang masuk</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <form class="form-horizontal" method='POST' action="{{action('BarangmasukController@addbrgmasuk')}}">
            {{ csrf_field() }}
            <div class="panel-heading text-center">
                Masukkan tanggal dan pemasok
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
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

                        <select name="supplier" class="form-control">
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

            <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Tambahkan</button>
            </div>
            </form>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- tabel untuk simpan daftar barang -->
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <form class="form-horizontal" method='POST' action="">
            {{ csrf_field() }}
            <div class="panel-heading text-center">
                Masukkan barang masuk
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="form-group{{ $errors->has('barang') ? ' has-error' : '' }}">
                    <label for="barang" class="col-md-4 control-label">Pilih Barang</label>

                    <div class="col-md-6">

                        <select name="barang" class="form-control">
                            <option value="" selected disabled>Pilih Barang</option>
                            @foreach($barang as $value)

                            <option value='{{$value->id_barang}}'>{{$value->nama_barang}}</option>

                            @endforeach
    
                        </select>

                        @if ($errors->has('bidang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bidang') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="jumlahbrgmsk" class="col-md-4 control-label">Jumlah Barang</label>

                    <div class="col-md-6">
                        <input id="jumlahbrgmsk" type="text" class="form-control" name="jumlahbrgmsk" value="{{ $value->jumlahbrgmsk }}" required autofocus>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Tambahkan</button>
            </div>
            </form>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- tabel untuk satu transaksi -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Laporan Transaksi Barang Masuk
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Supplier</th>
                            <th>Tanggal Masuk</th>
                            <th>Jumlah Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-sm">Reset</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>

@endsection
<!-- @section('jsscript')
<script type="text/javascript">
    $(".tambahbrgmsk").on('click', function(){
       var namabarang = $(".namabarang option:selected")
       var jumlahbrgmsk = $(".jumlahbrgmsk")
      if(namabarang.val() != "" && jumlahbrgmsk.val() != ""){
        var id = namabarang.val()
        var nama = namabarang.text()
        var jml = jumlahbrgmsk.val()
        $('#dataTables-example > tbody:last-child').append('<tr><td>'+id+'<input name="id_barang[]" value="'+id+'" style="display:none"></td><td>'+nama+'<input name="nama_barang[]" value="'+nama+'" style="display:none"></td><td>'+jml+'<input name="jumlahbrgmsk[]" value="'+jml+'" style="display:none"></td></tr>');
      }
    });
</script>
@endsection -->
@section('jsscript')
<script type="text/javascript">
    $(function(){
        $(#tanggal_masuk).datepicker({
            autoclose: true
        });
    })
</script>
@endsection