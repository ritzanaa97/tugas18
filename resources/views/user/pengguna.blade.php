@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Master Data Pengguna</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>      
     <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#MyModal"><i class="glyphicon glyphicon-plus"></i> Daftarkan</button>
                <div class="panel-heading text-center">
                    Data Pengguna
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="users table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Hak Akses</th>
                                <th>Bidang</th>
                                <th>Status</th>
                                <th style="width: 20px">Ubah</th>
                                <th style="width: 20px">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $value)
                            <tr>
                                <td>{{ $value->nip }}</td>
                                <td>{{ $value->nama_lengkap }}</td>
                                <td>{{ $value->level}}</td>
                                <td>{{ ($value->bidang)?$value->bidang->nama_bidang:'-' }}</td>
                                <td>{{ $value->status}}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#ubahuser{{$value->nip}}">
                                        <span class="glyphicon glyphicon-edit" style="color:#FFFFFF" data-toggle="#modal" data-target="#ubahusers">
                                        </span> Ubah
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#hapususer{{$value->nip}}">
                                        <span class="glyphicon glyphicon-trash" style="color:#FFFFFF" data-toggle="#modal" data-target="#hapususer">
                                        </span> Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- modal ubah -->
                    @foreach ($users as $value)
                    <div class="modal fade" id="ubahuser{{$value->nip}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Pengguna Sistem Inventori</h4>
                                </div>
                                <form class="form-horizontal" method="POST" action="{{route('users.update',[$value->nip]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                <div class="modal-body">
                                        <div class="form-group">
                                            <label for="level" class="col-md-4 control-label">Pilih Hak Akses Pengguna</label>

                                            <div class="col-md-6">
                                                <select name="level" class="form-control hak_akses">
                                                    <option value="admin">Admin</option>
                                                    <option value="bidang">Bidang</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_lengkap" class="col-md-4 control-label">Nama Lengkap</label>

                                            <div class="col-md-6">
                                                <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="{{ $value->nama_lengkap }}" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nip" class="col-md-4 control-label">NIP</label>

                                            <div class="col-md-6">
                                                <input id="nip" type="text" class="form-control" name="nip" value="{{ $value->nip }}" required autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="bidang" class="col-md-4 control-label">Bidang</label>

                                            <div class="col-md-6">

                                                <select name="bidang" class="form-control">
                                                    <option value="" selected disabled>Pilih Bidang</option>
                                                    @foreach($bidang as $namabidang)

                                                    <option @if($namabidang->id_bidang==$value->id_bidang){{"selected"}}@endif value="{{$namabidang->id_bidang}}">{{$namabidang->nama_bidang}}</option>

                                                    @endforeach
                            
                                                </select>
                                            </div>
                                        </div>
                                </div> 
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- hapus user -->
                    <div id="hapususer{{$value->nip}}" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">

                                <input type="hidden" name="method" value="DELETE">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">x</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Hapus Data Pengguna</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Yakin hapus data ini<span class="del-name" style="font-weight: bold;"></span>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{route('users.hapus',[$value->nip]) }}" class="btn btn-md btn-success delete">Ya</a>
                                        <button data-dismiss="modal" class="btn btn-danger">Tidak</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- model tambah -->
                    <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title text-center" id="myModalLabel">Daftarkan Pengguna Sistem Inventori</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" method="POST" action="{{ route('tambahuser') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                            <label for="level" class="col-md-4 control-label">Hak Akses Pengguna</label>

                                            <div class="col-md-6">
                                                <select name="level" class="form-control hak_akses" >
                                                    <option value="" selected disabled>Pilih Hak Akses Pengguna</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Bidang">Bidang</option>
                                                </select>

                                                @if ($errors->has('level'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('level') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('nama_lengkap') ? ' has-error' : '' }}">
                                            <label for="nama_lengkap" class="col-md-4 control-label">Nama Lengkap</label>

                                            <div class="col-md-6">
                                                <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autofocus>

                                                @if ($errors->has('nama_lengkap'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('nama_lengkap') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                                            <label for="nip" class="col-md-4 control-label">NIP</label>

                                            <div class="col-md-6">
                                                <input id="nip" type="text" class="form-control" name="nip" value="{{ old('nip') }}" required autofocus>

                                                @if ($errors->has('nip'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('nip') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('bidang') ? ' has-error' : '' }}">
                                            <label for="bidang" class="col-md-4 control-label">Bidang</label>

                                            <div class="col-md-6">

                                                <select name="bidang" class="form-control">
                                                    <option value="" selected disabled>Pilih Bidang</option>
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

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Daftarkan</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    </div>
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
 // $(document).ready(function(){ //untuk melakukan penampilan sesuai dengan opsi yang dipilih
 //        if ($('.hak_akses').val()== "admin" ){ //jika hak akses pada dropdown dipilih admin maka
 //            $('.pilihbidang').show(function(){
 //                var id_seksi=$(this).find('option:selected').data('seksi');
 //                $('.pilihseksi').find('select').val(id_seksi).trigger('change')
 //            });
 //            $('.pilihseksi').show();
 //            $('.pilihseksi').find('select')
 //        }else if($('.hak_akses').val()== "kepalabidang"){
 //            $('.pilihbidang').show();
 //            $('.pilihseksi').hide();
 //        }else{
 //            $('.pilihbidang').show(function(){
 //                var id_seksi=$(this).find('option:selected').data('seksi');
 //                $('.pilihseksi').find('select').val(id_seksi).trigger('change')
 //            });
 //            $('.pilihseksi').show();
 //            $('.pilihseksi').find('select')
 //        }        
 //    })
 //        $('.hak_akses').change(function(){ //ketika dirubah menampilkan opsi sesuai hak akses yg dipilih
 //            if ($('.hak_akses').val()== "admin" ){ //jika hak akses pada dropdown dipilih admin maka
 //            $('.pilihbidang').show(function(){
 //                var id_seksi=$(this).find('option:selected').data('seksi');
 //                $('.pilihseksi').find('select').val(id_seksi).trigger('change')
 //            });
 //            $('.pilihseksi').show();
 //            $('.pilihseksi').find('select')
 //        }else if($('.hak_akses').val()== "kepalabidang"){
 //            $('.pilihbidang').show();
 //            $('.pilihseksi').hide();
 //        }else{
 //            $('.pilihbidang').show(function(){
 //                var id_seksi=$(this).find('option:selected').data('seksi');
 //                $('.pilihseksi').find('select').val(id_seksi).trigger('change')
 //            });
 //            $('.pilihseksi').show();
 //            $('.pilihseksi').find('select')
 //        }        
 //    })

 //    $('.pilihbidang').find('select').change(function(){
 //        var id_seksi=$(this).find('option:selected').data('seksi');
 //        $('.pilihseksi').find('select').val(id_seksi).trigger('change')
 //    })

 //    // $('.hapus').on("click",function () {
 //    //     swal({
 //    //       title: "Yakin Hapus Pengguna?",
 //    //       text: "Ketika anda menghapus data ini, maka Anda tidak akan bisa memulihkannya lagi!",
 //    //       icon: "warning",
 //    //       buttons: true,
 //    //       dangerMode: true,
 //    //     })
 //    //     .then((willDelete) => {
 //    //       if (willDelete) {
 //    //         swal("Data berhasil dihapus", {
 //    //           icon: "success",
 //    //         });
 //    //         // url delete

 //    //       } else {
 //    //         swal("Data tidak jadi dihapus");
 //    //       }
 //    //     });
 //    // })
</script>
@endsection
