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

                <!-- @foreach ($formnames as $formname)
                @include("form.$formname->formname",["ordno" => $var1])
                @endforeach -->

                <form action="#" id="f-request">

                    <div class="group_data">
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
                                <input name="order_id" disabled id="order_id" class="form-control" type="text"></input>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                เลขที่ PO :
                            </div>
                            <div class="col-md-8">
                                <input name="po" id="po" class="form-control" type="text"></input>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                รหัสลูกค้า :
                            </div>
                            <div class="col-md-8">
                                <input name="cust_code" disabled id="cust_code" class="form-control"
                                    type="text"></input>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ชื่อลูกค้า <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-8">
                                <select name="cust_name" id="cust_name" class="form-control">
                                    <option value="">-- Please Select --</option>
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

                    <div class="group_data">

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
                    <div class="group_data">
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
    }).then(function(isConfirm) {
        if (isConfirm) {
            
            let ordno = $("input[name=orderno]").val();
            let prevstate = $("input[name=prevstate]").val() == "" ? null : $("input[name=prevstate]")
                .val();
            let currentstate = $("input[name=currentstate]").val();
            let nextstate = $("input[name=nextstate]").val();
            let updatedby = $("input[name=updatedby]").val();

            var Base64 = {
                _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
                encode: function(e) {
                    var t = "";
                    var n, r, i, s, o, u, a;
                    var f = 0;
                    e = Base64._utf8_encode(e);
                    while (f < e.length) {
                        n = e.charCodeAt(f++);
                        r = e.charCodeAt(f++);
                        i = e.charCodeAt(f++);
                        s = n >> 2;
                        o = (n & 3) << 4 | r >> 4;
                        u = (r & 15) << 2 | i >> 6;
                        a = i & 63;
                        if (isNaN(r)) {
                            u = a = 64
                        } else if (isNaN(i)) {
                            a = 64
                        }
                        t = t + this._keyStr.charAt(s) + this._keyStr.charAt(o) + this._keyStr
                            .charAt(u) + this
                            ._keyStr.charAt(a)
                    }
                    return t
                },
                decode: function(e) {
                    var t = "";
                    var n, r, i;
                    var s, o, u, a;
                    var f = 0;
                    e = e.replace(/[^A-Za-z0-9\+\/\=]/g, "");
                    while (f < e.length) {
                        s = this._keyStr.indexOf(e.charAt(f++));
                        o = this._keyStr.indexOf(e.charAt(f++));
                        u = this._keyStr.indexOf(e.charAt(f++));
                        a = this._keyStr.indexOf(e.charAt(f++));
                        n = s << 2 | o >> 4;
                        r = (o & 15) << 4 | u >> 2;
                        i = (u & 3) << 6 | a;
                        t = t + String.fromCharCode(n);
                        if (u != 64) {
                            t = t + String.fromCharCode(r)
                        }
                        if (a != 64) {
                            t = t + String.fromCharCode(i)
                        }
                    }
                    t = Base64._utf8_decode(t);
                    return t
                },
                _utf8_encode: function(e) {
                    e = e.replace(/\r\n/g, "\n");
                    var t = "";
                    for (var n = 0; n < e.length; n++) {
                        var r = e.charCodeAt(n);
                        if (r < 128) {
                            t += String.fromCharCode(r)
                        } else if (r > 127 && r < 2048) {
                            t += String.fromCharCode(r >> 6 | 192);
                            t += String.fromCharCode(r & 63 | 128)
                        } else {
                            t += String.fromCharCode(r >> 12 | 224);
                            t += String.fromCharCode(r >> 6 & 63 | 128);
                            t += String.fromCharCode(r & 63 | 128)
                        }
                    }
                    return t
                },
                _utf8_decode: function(e) {
                    var t = "";
                    var n = 0;
                    var r = c1 = c2 = 0;
                    while (n < e.length) {
                        r = e.charCodeAt(n);
                        if (r < 128) {
                            t += String.fromCharCode(r);
                            n++
                        } else if (r > 191 && r < 224) {
                            c2 = e.charCodeAt(n + 1);
                            t += String.fromCharCode((r & 31) << 6 | c2 & 63);
                            n += 2
                        } else {
                            c2 = e.charCodeAt(n + 1);
                            c3 = e.charCodeAt(n + 2);
                            t += String.fromCharCode((r & 15) << 12 | (c2 & 63) << 6 | c3 & 63);
                            n += 3
                        }
                    }
                    return t
                }
            }

            let formdata = {};

            for (var i = 0; i < $("#form1")[0].length; i++) {
                let subformdata = {};
                let type = $("#form1")[0][i].type;
                switch (type) {
                    case "text":
                        subformdata["type"] = type;
                        subformdata["name"] = $("#form1")[0][i].name;
                        subformdata["value"] = $("#form1")[0][i].value;
                        formdata[i] = subformdata;
                }

                $.ajax({
                    url: "/api/flow",
                    type: "POST",
                    data: jsonData,
                    success: function(response, status) {
                        if (status == "success") {
                            window.location.href = "{{ url(" / workinprogress ") }}";
                        }
                    },
                });
            };

        } else {
            return false;
        }
    });
});
</script>

@endsection