@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header text-center">Transaksi Barang Masuk</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('barangmasuk') }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group{{ $errors->has('nama_barang') ? ' has-error' : '' }}">
                    <label for="nama_barang" class="col-md-4 control-label">Nama Barang</label>

                    <div class="col-md-6">
                        <select name="nama_barang" class="form-control namabarang">
                            <option value="" selected disabled>Pilih barang</option>
                            @foreach($barang as $value)

                            <option id="pilihbarang" value='{{$value->id_barang}}'>{{$value->nama_barang}}</option>

                            @endforeach
    
                        </select>


                        @if ($errors->has('nama_barang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_barang') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('jumlahbrgmsk') ? ' has-error' : '' }}">
                    <label for="jumlahbrgmsk" class="col-md-4 control-label">Jumlah</label>

                    <div class="col-md-6">
                        <input id="jumlahbrgmsk" type="text" class="form-control jumlahbrgmsk" name="jumlahbrgmsk" value="{{ old('jumlahbrgmsk') }}" required autofocus>

                        @if ($errors->has('jumlahbrgmsk'))
                            <span class="help-block" id="inputjumlah">
                                <strong>{{ $errors->first('jumlahbrgmsk') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary tambahbrgmsk">Tambah</button>
                </div>
            <!-- /.panel-body -->
                </form>
            </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Barang yang masuk
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
                    <label for="supplier" class="col-md-4 control-label">Supplier</label>

                    <div class="col-md-6">

                        <select name="supplier" class="form-control">
                            <option value="" selected disabled>Pilih Supplier</option>
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
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangmasuk as $value)
                        <tr>
                            <td>{{ ($value->barang)?$value->barang->id_barang:'-' }}</td>
                            <td>{{ ($value->barang)?$value->barang->nama_barang:'-' }}</td>
                            <td>{{ $value->jumlahbrgmsk}}</td>
                            <td>
                                <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#">
                                    <span class="glyphicon glyphicon-trash" style="color:#ff0000" data-toggle="#modal" data-target="#">
                                    </span>Edit
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="alert alert-info">Klik Nomor Transaksi untuk melihat Detail Transaksi
</div>

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
                            <th>Nomor Transaksi</th>
                            <th>Supplier</th>
                            <th>Tanggal Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangmasuk as $value)
                        <tr>
                            <td>{{ $value->id_brgmasuk }}</td>
                            <td>{{ ($value->supplier)?$value->supplier->nama_supplier:'-' }}</td>
                            <td>{{ $value->tanggal_masuk}}</td>
                            <td>
                                <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#">
                                    <span class="glyphicon glyphicon-edit" style="color:#FFFFFF" data-toggle="#modal" data-target="#">
                                    </span>Edit
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

@endsection
@section('jsscript')
<script type="text/javascript">
$("#namabarang").on('change', function(){
  if($(this).val() != ""){
    $("#pilihbarang").text($("#namabarang option:selected").text());
    $(".namabarang").show();
  }else{
    $(".namabarang").hide();
  }
});
$("#jumlahbrgmsk").on('keyup change', function(){
  if($(this).val() != ""){
    $("#inputjumlah").text($(this).val());
    $(".jumlahbrgmsk").show();
  }else{
    $(".jumlahbrgmsk").hide();
  }
});
</script>
@endsection
