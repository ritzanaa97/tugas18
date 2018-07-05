@extends('layouts.app')

@section('content')

<div class="modal fade in" id="importjb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block; padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <form class="form-inline well well-sm pull-right" enctype="multipart/form-data" method="post" action="{{ action('JenisbarangController@jenisbarangimport') }}">
                    {{ csrf_field() }}
                    <a class="btn btn-default btn-sm" href="{{ route('jenisbarang.export') }}"><i class="glyphicon glyphicon-export"></i> Export Laporan Excel</a>
                    <input type="file" name="jenisbarangimport" class="btn btn-default btn-sm">
                    <input type="submit" value="Import" class="btn btn-default btn-sm">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection