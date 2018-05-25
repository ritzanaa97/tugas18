@extends('layouts.app')

@section('content')
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Barang Keluar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Laporan Transaksi Barang Keluar
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle pull-right" data-toggle="dropdown">Pilih Bulan <span class="caret"></span><!-- span class caret untuk memunculkan icon segitiga terbalik pada dropdown --> 
                            </button>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Semua</a>
                                </li>
                                <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Bidang</a>
                                </li>
                                <li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Seksi</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="home">
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Jumlah Masuk</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                            <!-- /.table-responsive -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-barang">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Jumlah Masuk</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                            <!-- /.table-responsive -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-seksi">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Jumlah Masuk</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                            <!-- /.table-responsive -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                            <ul class="pagination">
                                <li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous">
                                    <a href="#">Previous</a>
                                </li>
                                <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0">
                                    <a href="#">1</a>
                                </li>
                                <li class="paginate_button " aria-controls="dataTables-example" tabindex="0">
                                    <a href="#">2</a>
                                </li>
                                <li class="paginate_button " aria-controls="dataTables-example" tabindex="0">
                                    <a href="#">3</a>
                                </li>
                                <li class="paginate_button " aria-controls="dataTables-example" tabindex="0">
                                    <a href="#">4</a>
                                </li>
                                <li class="paginate_button " aria-controls="dataTables-example" tabindex="0">
                                    <a href="#">5</a>
                                </li>
                                <li class="paginate_button " aria-controls="dataTables-example" tabindex="0">
                                    <a href="#">6</a>
                                </li>
                                <li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next">
                                    <a href="#">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
        </div>
@endsection
@section('jsscript')
<script type="text/javascript">
$(document).ready(function() {
    $('#dataTables-barang').DataTable({
        responsive: true
    });
});
$(document).ready(function() {
    $('#dataTables-seksi').DataTable({
        responsive: true
    });
});
</script>
@endsection