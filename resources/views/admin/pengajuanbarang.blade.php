@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">Form Pengajuan Barang</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('pengajuanbarang') }}">
                {{ csrf_field() }}

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

                <div class="form-group{{ $errors->has('nama_barang') ? ' has-error' : '' }}">
                    <label for="nama_barang" class="col-md-4 control-label">Nama Barang</label>

                    <div class="col-md-6">
                        <select name="nama_barang" class="form-control">
                            <option value="" selected disabled>Pilih barang</option>
                            @foreach($barang as $value)

                            <option value='{{$value->id_barang}}'>{{$value->nama_barang}}</option>

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
                        <input id="jumlahbrgmsk" type="text" class="form-control" name="jumlahbrgmsk" value="{{ old('jumlahbrgmsk') }}" required autofocus>

                        @if ($errors->has('jumlahbrgmsk'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jumlahbrgmsk') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            <!-- /.panel-body -->
                </form>
            </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
    @endforeach
@endsection