<!DOCTYPE html>
<html lang="en">

<head>

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
        <link href="{{asset('inventoriadmin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('inventoriadmin/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('inventoriadmin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{asset('inventoriadmin/vendor/morrisjs/morris.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{asset('inventoriadmin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

        <link href="{{asset('inventoriadmin/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
        <!-- DataTables CSS -->
        <link href="{{asset('inventoriadmin/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
        <!-- Select2 CSS -->
        <link href="{{asset('inventoriadmin/select2/dist/css/select2.min.css')}}" rel="stylesheet">
        <!-- Sweet Alert -->
        <link rel="stylesheet" type="text/css" href="{{url('sweetalert-master/src/sweetalert.css')}}">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <img style="padding-top: 5px; padding-left: 10px; width: 220px" src="{{url('inventoriadmin/dist/css/images/logo.png')}}">
            <!-- /.navbar-header -->
            <ul class="dropdown pull-right" style="padding-right: 20px; padding-top: 25px">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><i class="fa fa-user"></i>
                    {{ Auth::user()->nama_lengkap }} <span class="caret"></span>
                </a>

                <li class="dropdown-menu">
                    <ul>
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-fw"></i>
                        Keluar
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </li>
        </ul>
        <!-- /.navbar-top-links -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
             @if(\Illuminate\Support\Facades\Auth::user()->status == 'aktif')
             <ul class="nav" id="side-menu">
             </li>
             <li>
                <a href="{{url('/dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
            </li>
            @if(Auth::user()->level=='admin')
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Master Data<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/pengguna')}}"><i class="fa fa-users fa-fw"></i> Data Pengguna</a>
                    </li>
                    <li>
                        <a href="{{url('/supplier')}}"><i class="fa fa-truck"></i> Data Supplier</a>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-cubes"></i> Master Barang<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level collapse in" aria-expanded="true" style="">
                            <li>
                                <a href="{{url('/jenisbarang')}}">Data Jenis Barang</a>
                            </li>
                            <li>
                                <a href="{{url('/barang')}}">Data Barang</a>
                            </li>
                            <li>
                                <a href="{{url('/satuan')}}">Data Satuan</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->level=='admin')
                        <!-- <li>
                            <a href="{{url('/belanjabarang')}}"><i class="fa fa-shopping-cart "></i> Belanja Barang</a>
                        </li> -->
                        <!-- <li>
                            <a href="{{url('/baranghabis')}}"><i class="glyphicon glyphicon-list-alt"></i> Barang Habis</a>
                        </li> -->
                        <li>
                            <a href="{{url('/barangmasuk')}}"><i class="glyphicon glyphicon-save"></i> Barang Masuk</a>
                        </li>
                        <li>
                            <a href="{{url('/daftar')}}"><i class="fa fa-list-ol"></i> Daftar Pengajuan Barang</a>
                        </li>
                        <li>
                            <a href="{{url('/barangkeluar')}}"><i class="glyphicon glyphicon-open"></i> Serah Barang</a>
                        </li>
                        <li>
                            <a href="{{url('/panduan_admin')}}"><i class="fa fa-book "></i> Panduan</a>
                        </li>
                        @endif
                        @if(Auth::user()->level=='bidang')
                        <li>
                            <a href="{{url('/terimabarang')}}"><i class="glyphicon glyphicon-save"></i> Terima Barang</a>
                        </li>
                        <li>
                            <a href="{{url('/ajukan')}}"><i class="fa fa-edit fa-fw"></i> Isi Pengajuan Barang</a>
                        </li>
                        <li>
                            <a href="{{url('/riwayat')}}"><i class="fa fa-history"></i> Daftar Pengajuan Barang</a>
                        </li>
                        <li>
                            <a href="{{url('/ubahpassword')}}"><i class="fa fa-refresh "></i> Ubah Password</a>
                        </li>
                        <li>
                            <a href="{{url('#')}}"><i class="fa fa-book "></i> Panduan</a>
                        </li>
                        @endif
                    </ul>
                    @endif
                    <!-- endif diatas buat ketika status pengguna = aktif -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            @yield('alert')
            @yield('content')
            
            <!-- yield buat memanggil -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('inventoriadmin/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('inventoriadmin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('inventoriadmin/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('inventoriadmin/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('inventoriadmin/vendor/morrisjs/morris.min.js')}}"></script>
    <script src="{{asset('inventoriadmin/data/morris-data.js')}}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{asset('inventoriadmin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('inventoriadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('inventoriadmin/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>

    <script src="{{asset('inventoriadmin/js/jquery.printPage.js')}}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{asset('inventoriadmin/select2/dist/js/select2.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('inventoriadmin/dist/js/sb-admin-2.js')}}"></script>
    <!-- Sweet Alert -->
    <script src="{{url('sweetalert-master/src/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
        $(document).ready(function() {
            $('#dataTables-example2').DataTable({
                responsive: true
            });
        });
        $(document).ready(function() {
            $('.js-aset').select2();
        });
    </script>
    @include('sweet::alert')
    @yield('jsscript')
</body>

</html>
