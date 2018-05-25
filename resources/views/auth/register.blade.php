<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Daftarkan Pengguna Sistem Inventori</h4>
            </div>


                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-4 control-label">Pilih Hak Akses Pengguna</label>

                            <div class="col-md-6">
                                <!-- <input id="level" type="text" class="form-control" name="level" value="{{ old('level') }}" required autofocus> -->
                                <select name="level" class="form-control hak_akses" >
                                    <option value="admin">Admin</option>
                                    <option value="kepalabidang">Kepala Bidang</option>
                                    <option value="kepalaseksi">Kepala Seksi</option>
                                </select>

                                @if ($errors->has('level'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
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

                        <div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
                            <label for="tanggal_lahir" class="col-md-4 control-label">Tanggal Lahir</label>

                            <div class="col-md-6">
                                <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required autofocus>

                                @if ($errors->has('tanggal_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                            <label for="tempat_lahir" class="col-md-4 control-label">Tempat Lahir</label>

                            <div class="col-md-6">
                                <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required autofocus>

                                @if ($errors->has('tempat_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
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

                        <div class="form-group{{ $errors->has('instansi') ? ' has-error' : '' }}">
                            <label for="instansi" class="col-md-4 control-label">Instansi</label>

                            <div class="col-md-6">
                                <input id="instansi" type="text" class="form-control" name="instansi" value="Kantor Regional I BKN Yogyakarta" required readonly autofocus>

                                @if ($errors->has('instansi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('instansi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class=" pilihbidang form-group{{ $errors->has('bidang') ? ' has-error' : '' }}">
                            <label for="bidang" class="col-md-4 control-label">Bidang</label>

                            <div class="col-md-6">
                                <!-- <input id="bidang" type="text" class="form-control" name="bidang" value="{{ old('bidang') }}" required autofocus> -->

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

                        <div class="pilihseksi form-group{{ $errors->has('seksi') ? ' has-error' : '' }}">
                            <label for="seksi" class="col-md-4 control-label">Seksi</label>

                            <div class="col-md-6">
                                <!-- <input id="seksi" type="text" class="form-control" name="seksi" value="{{ old('seksi') }}" required autofocus> -->

                                <select name="seksi" class="form-control ">
                                    <option value="" selected disabled>Pilih Seksi</option>
                                    @foreach($seksi as $value)

                                    <option value='{{$value->id_seksi}}' data-bidang="{{$value->id_bidang}}">{{$value->nama_seksi}}</option>

                                    @endforeach
                                </select>

                                @if ($errors->has('seksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seksi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                            <label for="jabatan" class="col-md-4 control-label">Jabatan</label>

                            <div class="col-md-6">
                                <input id="jabatan" type="text" class="form-control" name="jabatan" value="" required autofocus>

                                @if ($errors->has('jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary">Daftarkan</button>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
@section('jsscript')
<script>
    $(document).ready(function(){ //untuk melakukan penampilan sesuai dengan opsi yang dipilih
        if ($('.hak_akses').val()== "admin" ){ //jika hak akses pada dropdown dipilih admin maka
            $('.pilihbidang').show(); //dropdown bidang akan muncul dan
            $('.pilihseksi').show(function(){ //dropdown seksi juga akan muncul
                var id_bidang=$(this).find('option:selected').data('bidang');
                $('.pilihbidang').find('select').val(id_bidang).trigger('change').attr('readonly',true)
            });
            $('.pilihbidang').find('select').attr('readonly',true)
        }else if($('.hak_akses').val()== "kepalabidang"){
            $('.pilihbidang').show();
            $('.pilihseksi').hide();
        }else{
            $('.pilihbidang').show();
            $('.pilihseksi').show(function(){
                var id_bidang=$(this).find('option:selected').data('bidang');
                $('.pilihbidang').find('select').val(id_bidang).trigger('change').attr('readonly',true)
            });
            $('.pilihbidang').find('select').attr('readonly',true)
        }
        
    })
        $('.hak_akses').change(function(){ //ketika dirubah menampilkan opsi sesuai hak akses yg dipilih
            if ($('.hak_akses').val()== "admin" ){
            $('.pilihbidang').show();
             $('.pilihseksi').show(function(){
                var id_bidang=$(this).find('option:selected').data('bidang');
                $('.pilihbidang').find('select').val(id_bidang).trigger('change').attr('readonly',true)
            });
            $('.pilihbidang').find('select').attr('readonly',true)
        }else if($('.hak_akses').val()== "kepalabidang"){
            $('.pilihbidang').show();
            $('.pilihseksi').hide();
            $('.pilihbidang').find('select').attr('readonly',false)
        }else{
            $('.pilihbidang').show();
            $('.pilihseksi').show(function(){
                var id_bidang=$(this).find('option:selected').data('bidang');
                $('.pilihbidang').find('select').val(id_bidang).trigger('change').attr('readonly',true)
            });
            $('.pilihbidang').find('select').attr('readonly',true)
        }
    })

    $('.pilihseksi').find('select').change(function(){
        var id_bidang=$(this).find('option:selected').data('bidang');
        $('.pilihbidang').find('select').val(id_bidang).trigger('change').attr('readonly',true)
    })


    //     var jenis=$(this).val()
    //     if ($(this).val() == "kepalabidang" ) {
    //         var url = "{{url ('bidang')}}";

    //     } else if ($(this).val() == "kepalaseksi" ){
    //         var url = "{{url ('seksi')}}";
    //     }
    //     $.ajax({url:url, success: function(result){
    //         $('.pilihbidang').empty();
    //         $('.pilihseksi').empty();
    //         $.each(result,function(key,val){
                
    //             if (jenis == "kepalabidang"){
    //                 $('.pilihbidang').append('<option value="'+val.id_bidang+'">'+val.nama_bidang+'</option>');
    //             }else if (jenis == "kepalaseksi"){
    //                 $('.pilihseksi').append('<option value="'+val.id_seksi+'">'+val.nama_seksi+'</option>');
    //             }
    //         })
    // }});
    // })
    </script>
@endsection
@section('js')