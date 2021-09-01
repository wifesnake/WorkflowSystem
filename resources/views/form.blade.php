@extends('layouts.master')

@section('content')
@php
    $var1 = ""
@endphp
@foreach ($flowdatas as $flowdata)
    <input type="text" name="orderno" id="orderno" value="{{ $flowdata->ord_vehicle }}">
    <input type="text" name="prevstate" id="prevstate" value="{{ $flowdata->prev_state }}">
    <input type="text" name="currentstate" id="currentstate" value="{{ $flowdata->current_state }}">
    <input type="text" name="nextstate" id="nextstate" value="{{ $flowdata->next_state }}">
    <input type="text" name="updatedby" id="updatedby" value="{{ Auth::user()->name }}">

    @php
        $var1 = $flowdata->ord_vehicle
    @endphp
@endforeach
<form action="#" id="form1">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="position: relative">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                    <h1>State {{ __($flowdata->current_state) }} - {{ __($flowdata->state_name) }}</h1>
                    <br>
                    @foreach ($formnames as $formname)
                        @include("form.$formname->formname", ["ordno" => $var1])
                    @endforeach
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        @if ($is_admin == 1)
            <div style="position: absolute; bottom: 0; padding: 10px 5px;">
                <button type="submit" class="btn btn-primary">Request</button>
            </div>
        @else
            <div style="position: absolute; bottom: 0; padding: 10px 5px;">
                <button type="submit" class="btn btn-primary">Approve</button>
            </div>
        @endif

    </div>
    <!-- /.content-wrapper -->
</form>

@endsection
