<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script language='JavaScript'>
        var tulisan=" || Sistem Informasi Inventori || Kantor Regional I BKN Yogyakarta";
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
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" > -->

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
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">LOGO</a>
                <a style="text-align: center;" class="navbar-brand">Sistem Informasi Inventori - Tata Usaha dan Rumah Tangga</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
<!--                         <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{url('/dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Master Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/pengguna')}}"><i class="fa fa-users fa-fw"></i> Data Pengguna</a>
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
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>

                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{url('/barangmasuk')}}"><i class="glyphicon glyphicon-save"></i> Transaksi Barang Masuk</a>
                        </li>
                        <li>
                            <a href="{{url('/barangkeluar')}}"><i class="glyphicon glyphicon-open"></i> Transaksi Barang Keluar</a>
                        </li>
                        <li>
                            <a href="{{url('/pengajuanbarang')}}"><i class="fa fa-edit fa-fw"></i> Form Permintaan Barang</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
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
    <script src="{{asset('inventoriadmin/vendor/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Select2 JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('inventoriadmin/dist/js/sb-admin-2.js')}}"></script>
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
    </script>
    @yield('jsscript')
</body>

</html>
