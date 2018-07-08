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
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body onclick="window.print()">
    <div class="row" style="padding-top: 50px; padding-right: 20px">
        <!-- <a class="btn btn-primary btn-sm pull-right"><i class="fa fa-print"></i> Print</a> -->
        <div class="col-md-4 text-center"><br>
            <img style="width: 80px" src="{{url('inventoriadmin/dist/css/images/garuda.png')}}">
            <h5 class="text-center">BADAN KEPEGAWAIAN NEGARA</h5>
            <h5 class="text-center">Kantor Regional I</h5>
        </div>
        <div class="col-md-4"><br>
            <h4 class="text-center"><b>KANTOR REGIONAL I</b></h4>
            <h4 class="text-center"><b>BADAN KEPEGAWAIAN NEGARA</b></h4>
            <h4 class="text-center" style="padding-top: 25px"><b><u>DAFTAR BARANG YANG AKAN HABIS</u></b></h4>
        </div>
        <div class="col-lg-12">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode Barang</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Jenis Barang</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">Jumlah Stok</th>
                                <th class="text-center">Jumlah Belanja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;?>
                            @foreach ($barang as $value)
                            @if($value->jumlahbarang < '10')
                            <?php $no++ ;?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{ $value->id_barang }}</td>
                                <td>{{ $value->nama_barang }}</td>
                                <td>{{ ($value->jenisbarang)?$value->jenisbarang->nama_jenisbarang:''}}</td>
                                <td>{{ ($value->satuan)?$value->satuan->nama_satuan:'-' }}</td>
                                <td>{{ $value->jumlahbarang }}</td>
                                <td></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>

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

    <script src="{{asset('inventoriadmin/js/jquery.printPage.js')}}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{asset('inventoriadmin/select2/dist/js/select2.min.js')}}"></script>

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
        $(document).ready(function() {
            $('.js-aset').select2();
        });
    </script>
    @yield('jsscript')
    @yield('alert')
</body>

</html>