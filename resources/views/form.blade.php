@extends('layouts.master')

@section('content')

<form action="#" id="form1">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="position: relative">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @foreach ($flowdatas as $flowdata)
                    <input type="text" name="orderno" id="orderno" value="{{ $flowdata->ord_vehicle }}">
                    <input type="text" name="prevstate" id="prevstate" value="{{ $flowdata->prev_state }}">
                    <input type="text" name="currentstate" id="currentstate" value="{{ $flowdata->current_state }}">
                    <input type="text" name="nextstate" id="nextstate" value="{{ $flowdata->next_state }}">
                    <input type="text" name="updatedby" id="updatedby" value="{{ Auth::user()->name }}">

                    <h1>State {{ __($flowdata->current_state) }} - {{ __($flowdata->state_name) }}</h1>

                    @include("form.$flowdata->formname")

                @endforeach

            </div>
            <!-- /.container-fluid -->
        </div>

        @if ($is_admin == 1)
            <div style="position: absolute; bottom: 0; padding: 10px 5px;">
                <button type="submit" class="btn btn-primary">Request</button>
            </div>
        @else
            <div style="position: absolute; bottom: 0; padding: 10px 5px;">
                <button type="submit" class="btn btn-primary">Approve</button>
            </div>
        @endif

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</form>

@endsection
