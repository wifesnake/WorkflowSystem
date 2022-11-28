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

                <div class="title-header">เพิ่มข้อมูลการจัดส่งสินค้า</div>

                 {{-- @foreach ($formnames as $formname)
                @include("form.$formname->formname",["ordno" => $var1])
                @endforeach  --}}

                <form action="#" id="f-request">

                    <div id="f-field1" class="group_data">
                        <div class="col-md-12">
                            <div class="title-form">
                                ข้อมูลการจัดส่งสินค้า
                            </div>
                        </div>

                        <div class="row col-md-12" style="display: none;" >
                            <div class="col-md-3">
                                เลขที่ Tracking Number :
                            </div>
                            <div class="col-md-8">
                                @foreach ($ordvehicle as $item)
                                    <input name="order_id" disabled id="order_id" class="form-control" type="text" value="{{ $item->runno }}">
                                @endforeach

                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                เลขที่ PO :
                            </div>
                            <div class="col-md-8">
                                <input name="po" id="po" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                รหัสลูกค้า :
                            </div>
                            <div class="col-md-8">
                                <input name="cust_code" disabled id="cust_code" class="form-control"
                                    type="text">
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ชื่อลูกค้า <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-8">
                                <select name="cust_name" id="cust_name" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    @foreach ($tb_customer as $item)
                                    <option value="{{$item->customer_id}}">{{$item->customer_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ที่อยู่ลูกค้า :
                            </div>
                            <div class="col-md-8">
                                <textarea name="cust_address" disabled id="cust_address" class="form-control"
                                    rows="4"></textarea>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                เลขที่นิติบุคคล :
                            </div>
                            <div class="col-md-8">
                                <input name="cust_presonalcode" disabled id="cust_presonalcode" class="form-control"
                                    type="text">
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                หมายเหตุจากลูกค้า :
                            </div>
                            <div class="col-md-8">
                                <textarea name="order_remark" id="order_remark" class="form-control"
                                    rows="4"></textarea>
                            </div>
                        </div>
                    </div>

                    <div id="f-field2" class="group_data">

                        <div class="col-md-12">
                            <div class="title-form">
                                ข้อมูลผู้รับสินค้า
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ชื่อ-นามสกุล <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-8">
                                <input name="to_name" id="to_name" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ที่อยู่ <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-8">
                                <textarea name="to_address" id="to_address" class="form-control" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                โทรศัพท์ <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-8">
                                <input type="number" name="to_phone" id="to_phone" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <div id="f-field3" class="group_data">
                        <div class="col-md-12">
                            <div class="title-form">
                                รายละเอียดสินค้า
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                รายละเอียดสินค้า <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-8">
                                <input name="product_desc" id="product_desc" class="form-control" type="text">
                            </div>
                        </div>

                        <div style="display:none;">
                            <div class="row col-md-12">
                                <div class="col-md-3">
                                    ประรถที่ต้องการ <b class="request-data">**</b> :
                                </div>
                                <div class="col-md-8">
                                    <select name="car_type" id="car_type" class="form-control">
                                        <option value="">-- Please Select --</option>
                                        @foreach ($usevehicle as $item)
                                        <option value="{{$item->code_lookup}}">{{$item->value_lookup}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-3">
                                    {{-- จำนวน <b class="request-data">**</b> : --}}
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="row col-md-6">
                                            <div class="col-md-4">
                                                จำนวนรถเล็ก:
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number"name="m_unit" id="m_unit" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="row col-md-6">
                                            <div class="col-md-4">
                                                จำนวนรถใหญ่:
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number"name="L_unit" id="L_unit" class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ชนิดสินค้า <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-8">
                                <select name="product_type" id="product_type" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    @foreach ($producttype as $item)
                                    <option value="{{$item->code_lookup}}">{{$item->value_lookup}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                จำนวนสินค้า (ชิ้น/กล่อง) <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-8">
                                <input type="number" step="1" name="product_number" id="product_number" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                น้ำหนัก (kg) <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-8">
                                <input type="number" step="0.01" name="weight" id="weight" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                เพิ่มเติม :
                            </div>
                            <div class="col-md-8">
                                <textarea name="remark" id="remark" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="menu-action col-md-12">
                    <input id="save-data" type="button" class="btn btn-primary" value="บันทึกข้อมูล" />
                    <input id="cancel-data" type="button" class="btn btn-danger" value="ยกเลิก" />
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
</form>

<script>

    let Jsonformat = {
        "order_id":"",
        "po":"",
        "cust_code":"",
        "cust_name":"",
        "cust_address":"",
        "cust_presonalcode":"",
        "order_remark":"",
        "to_name":"",
        "to_address":"",
        "to_phone":"",
        "product_type":"",
        "product_desc":"",
        "product_number":"",
        "car_type":"",
        "m_unit":"",
        "L_unit":"",
        "weight":"",
        "remark":"",
        "base64":"",
        "created_by": '{{ Auth::user()->name }}',
        "updated_by": '{{ Auth::user()->name }}'
    }

    let JsonformatGet = {
        "order_id":"",
        "po":"",
        "cust_code":"customer_id",
        "cust_name":"",
        "cust_address":"address",
        "cust_presonalcode":"customer_person_number",
        "order_remark":"",
        "to_name":"",
        "to_address":"",
        "to_phone":"",
        "product_type":"",
        "product_desc":"",
        "product_number":"",
        "car_type":"",
        "m_unit":"",
        "L_unit":"",
        "weight":"",
        "remark":""
    }

    let formdata = {};

    // Create Base64 Object
    var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}

    $('[name~=cust_name]').on('change',async function(){
        const doc = $(this);
        if(doc.val() != ""){
            await $.ajax({
                url: "{{url('api/request')}}/"+doc.val(),
                type: "GET",
                data: {},
                success: function(response, status) {
                    if(status == "success"){
                        const data = response.data[0];
                        $.each(JsonformatGet,function(key,value){
                            if(value != ""){
                                $("[name="+key+"]").val(data[value]);
                            }
                        });
                    }
                },
            });
        }
    });

    $("#save-data").click(function($this) {

        swal({
            title: "",
            text: "คุณแน่ใจว่าต้องการบันทึกข้อมูลการจัดส่งสินค้านี้ ?",
            icon: "warning",
            buttons: {
                confirm: true,
                cancel: true,
            },
            infoMode: true,
        }).then(async function(isConfirm) {
            if (isConfirm) {

                await $('#f-field1').find('select,input,textarea').each(function(i, box) {
                    const name = $(box).attr("name");
                    if(name){
                        Jsonformat[name] = $("[name~="+name+"]").val();
                    }
                });

                await $('#form1').find('select,input,textarea').each(function(i,doc){
                    const name = $(doc).attr("name");
                    if(name){
                        Jsonformat[name] = $("[name~="+name+"]").val();
                    }
                });

                Jsonformat["base64"] = Base64.encode(JSON.stringify(Jsonformat));

                await $.ajax({
                    url: "{{url('api/request')}}",
                    type: "POST",
                    data: Jsonformat,
                    success: function(response, status) {
                        if(status == "success"){
                            window.location.href = "{{ url('/workinprogress') }}";
                        }
                    },
                });

            } else {

                Jsonformat = {
                    "order_id":"",
                    "po":"",
                    "cust_code":"customer_id",
                    "cust_name":"",
                    "cust_address":"address",
                    "cust_presonalcode":"customer_person_number",
                    "order_remark":"",
                    "to_name":"",
                    "to_address":"",
                    "to_phone":"",
                    "product_type":"",
                    "product_desc":"",
                    "product_number":"",
                    "m_unit":"",
                    "L_unit":"",
                    "weight":"",
                    "remark":"",
                    "created_by": '{{ Auth::user()->name }}',
                    "updated_by": '{{ Auth::user()->name }}'
                }

                return false;
            }
        });
    });
</script>

@endsection
