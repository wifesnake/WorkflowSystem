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

                        <div class="row col-md-12">
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
                                    type="text"></input>
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
                                <input name="to_name" id="to_name" class="form-control" type="text"></input>
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
                                <input name="to_phone" id="to_phone" class="form-control" type="text"></input>
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
                                <input name="product_type" id="product_type" class="form-control" type="text"></input>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                จำนวน <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-8">
                                <input name="unit" id="unit" class="form-control" type="text"></input>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                น้ำหนัก <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-8">
                                <input name="weight" id="weight" class="form-control" type="text"></input>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                Remark :
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

    let FormatJSon1 = {
        "order_id":"",
        "po":"",
        "cust_code":"",
        "cust_name":"",
        "cust_address":"",
        "cust_presonalcode":"",
        "order_remark":""
    }

    let FormatJSon2 = {
        "to_name":"",
        "to_address":"",
        "to_phone":""
    }

    let FormatJSon3 = {
        "product_type":"",
        "unit":"",
        "weight":"",
        "remark":""
    }

    let FormatJSonGet1 = {
        "order_id":"",
        "po":"",
        "cust_code":"customer_id",
        "cust_name":"",
        "cust_address":"address",
        "cust_presonalcode":"customer_person_number",
        "order_remark":""
    }

    let isResult1 =false,isResult2 =false,isResult3 =false;

$('[name~=cust_name]').on('change',async function(){
    const doc = $(this);
    await $.ajax({
        url: "{{url('api/request')}}/"+doc.val(),
        type: "GET",
        data: {},
        success: function(response, status) {
            if(status == "success"){
                const data = response.data[0];
                $.each(FormatJSonGet1,function(key,value){
                    if(value != ""){
                        $("[name="+key+"]").val(data[value]);
                    }
                });
            }
        },
    });
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

           await Field1();
           await Field2();
           await Field3();

        } else {
            return false;
        }
    });

    async function Field1(){
        await $('#f-field1').find('select,input,textarea').each(function(i, box) {
            const name = $(box).attr("name");
            if(name){
                FormatJSon1[name] = $("[name~="+name+"]").val();
            }
        });
        isResult1 = true;
        if(isResult1 && isResult2 && isResult3){
            onPost();
        }
    }

    async function Field2(){
        await $('#f-field2').find('select,input,textarea').each(function(i, box) {
            const name = $(box).attr("name");
            if(name){
                FormatJSon2[name] = $("[name~="+name+"]").val();
            }
        });
        isResult2 = true;
        if(isResult1 && isResult2 && isResult3){
            onPost();
        }
    }

    async function Field3(){
        await $('#f-field3').find('select,input,textarea').each(function(i, box) {
            const name = $(box).attr("name");
            if(name){
                FormatJSon3[name] = $("[name~="+name+"]").val();
            }
        });
        isResult3 = true;
        if(isResult1 && isResult2 && isResult3){
            onPost();
        }
    }

    async function onPost(){
        console.log("Start Post");
        console.log(FormatJSon1)
        console.log(FormatJSon2)
        console.log(FormatJSon3)

        await $.ajax({
            url: "{{url('api/employee')}}",
            type: "POST",
            data: FormatJSon1,
            success: function(response, status) {
                // if (status == "success") {
                //     window.location.href = "{{ url('/employee') }}";
                // }
            },
        });

        await $.ajax({
            url: "{{url('api/employee')}}",
            type: "POST",
            data: FormatJSon2,
            success: function(response, status) {
                // if (status == "success") {
                //     window.location.href = "{{ url('/employee') }}";
                // }
            },
        });

        await $.ajax({
            url: "{{url('api/employee')}}",
            type: "POST",
            data: FormatJSon3,
            success: function(response, status) {
                // if (status == "success") {
                //     window.location.href = "{{ url('/employee') }}";
                // }
            },
        });
    }
});
</script>

@endsection
