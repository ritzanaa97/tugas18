<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
    body{
        background: url('inventoriadmin/dist/css/images/background.jpg') fixed no-repeat top center;
        background-size: 100% 100%;
        background-color: rgba(255,255,255,0.8);
    }
</style>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<script language='JavaScript'>
    var tulisan=" || Sistem Inventori dan Pengajuan Barang || Kantor Regional I BKN Yogyakarta";
    var kecepatan=100;var fress=null;function jalan() { 
        document.title=tulisan;
        tulisan=tulisan.substring(1,tulisan.length)+tulisan.charAt(0);
        fress=setTimeout("jalan()",kecepatan);}jalan();
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('inventoriadmin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url('inventoriadmin/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('inventoriadmin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{url('inventoriadmin/vendor/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('inventoriadmin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="container" style="width: 1900px; padding-top: 90px">
        <div class="row" >
            <div class="col-md-4" style="padding-left: 50px" >
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <div class="col-md-2">
                            <img style="width: 100px" src="{{url('inventoriadmin/dist/css/images/garudawarna.png')}}">  
                        </div>
                        <div class="text-center">
                            <h4>Sistem Inventory dan Pengajuan Barang</h4>
                            <h4>Badan Kepegawaian Negara</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">NIP</label>

                                    <div class="col-md-6">
                                        <input id="nip" type="text" class="form-control" name="nip" value="{{ old('nip') }}" required autofocus>

                                        @if ($errors->has('nip'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nip') }}</strong>
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

                                <div class="form-group text-center">
                                    <div class="col-md-10 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Masuk
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{url('inventoriadmin/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('inventoriadmin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url('inventoriadmin/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{url('inventoriadmin/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{url('inventoriadmin/vendor/morrisjs/morris.min.js')}}"></script>
    <script src="{{url('inventoriadmin/data/morris-data.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{url('inventoriadmin/dist/js/sb-admin-2.js')}}"></script>

</body>

</html>