@extends('layouts.master')

@section('content')
@php
    $var1 = ""
@endphp
@foreach ($flowdatas as $flowdata)
    @php
        $var1 = $flowdata->ord_vehicle
    @endphp
@endforeach

<input type="hidden" name="orderno" id="orderno" value="{{ $flowdata->ord_vehicle }}">
<input type="hidden" name="prevstate" id="prevstate" value="{{ $flowdata->prev_state }}">
<input type="hidden" name="currentstate" id="currentstate" value="{{ $flowdata->current_state }}">
<input type="hidden" name="nextstate" id="nextstate" value="{{ $flowdata->next_state }}">
<input type="hidden" name="updatedby" id="updatedby" value="{{ Auth::user()->name }}">

<form action="#" id="form2">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="position: relative">
        <!-- Main content -->
        {{-- <div class="content"> --}}
            <div class="container-fluid">
                <h1>State {{ __($flowdata->current_state) }} - {{ __($flowdata->state_name) }}</h1>
                <br>
                @foreach ($formnames as $formname)
                    @include("form.$formname->formname", ["ordno" => $var1])
                @endforeach

                @foreach ($btnactions as $item)
                    <div style="position: absolute; bottom: 0; padding: 5px 0">
                        @if ($item->isPrevstate == 0)
                            <div onclick="btnClick('{{ $item->id }}','{{ $item->current_state }}','{{ $item->prev_state }}')" class="btn btn-primary">Back</div>
                        @endif

                        {{-- @if($item->isCurrentstate == 0)
                            <div style="position: absolute; bottom: 0; padding: 10px 5px;">
                                <button type="submit" class="btn btn-primary">Approve</button>
                            </div>
                        @endif --}}

                        @if($item->isTostate == 0)
                            <div onclick="btnClick('{{ $item->id }}','{{ $item->current_state }}','{{ $item->to_state }}')" class="btn btn-primary">Next</div>
                        @endif
                    </div>
                @endforeach
            </div>
            <!-- /.container-fluid -->
        {{-- </div> --}}
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</form>


<script>

    function btnClick(id,currentState,nextState){
        console.log(currentState);
        console.log(nextState);

        let ordno = $("input[name=orderno]").val();
        let prevstate = currentState;
        let currentstate = nextState;
        let updatedby = $("input[name=updatedby]").val();

        var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}

        let formdata = {};

        for(var i = 0; i < $("#form2")[0].length; i++){
            let subformdata = {};
            let type = $("#form2")[0][i].type;
            switch(type){
                case "text":
                    subformdata["type"] = type;
                    subformdata["name"] = $("#form2")[0][i].name;
                    subformdata["value"] = $("#form2")[0][i].value;
                    formdata[i] = subformdata;
            }

        }

        var jsonData = {
                id: id,
                ord_vehicle: ordno,
                prev_state: prevstate,
                current_state: currentstate,
                formdata: Base64.encode(JSON.stringify(formdata)),
                created_by: updatedby,
                updated_by: updatedby
        }

        $.ajax({
            url: "/api/state",
            type: "POST",
            data: jsonData,
            success:function(response,status){
                if(status == "success"){
                    window.location.href = "{{ url("/workinprogress") }}";
                }
            },
        });

    }
</script>

@endsection
