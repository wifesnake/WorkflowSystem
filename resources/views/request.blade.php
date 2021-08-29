@extends('layouts.master')

@section('content')
<form action="#" id="form1">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="position: relative">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <input type="text" name="fromstate" id="fromstate" value="0">
                <input type="text" name="tostate" id="tostate" value="1">
                <input type="text" name="updatedby" id="updatedby" value="{{ Auth::user()->name }}">
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
        <div style="position: absolute; bottom: 0; padding: 10px 5px;">
            <button type="submit" class="btn btn-primary">Request</button>
        </div>
    </div>
    <!-- /.content-wrapper -->
</form>
@endsection
