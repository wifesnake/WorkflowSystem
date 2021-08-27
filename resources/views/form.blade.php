@extends('layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="position: relative">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div id="vueapp"></div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        <div style="position: absolute; bottom: 0; padding: 10px 5px;">
            <div class="btn btn-primary">Request</div>
        </div>

    </div>
    <!-- /.content-wrapper -->

@endsection
