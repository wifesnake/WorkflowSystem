@extends('layouts.master')

@section('content')
@php
    $var1 = $ordno;
@endphp
<input type="hidden" name="orderno" id="orderno" value="{{ __($ordno) }}">
<input type="hidden" name="prevstate" id="prevstate" value="">
<input type="hidden" name="currentstate" id="currentstate" value="00">
<input type="hidden" name="nextstate" id="nextstate" value="01">
<input type="hidden" name="updatedby" id="updatedby" value="{{ Auth::user()->name }}">

<form action="#" id="form1">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="position: relative">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @foreach ($formnames as $formname)
                    @include("form.$formname->formname",["ordno" => $var1])
                @endforeach
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
