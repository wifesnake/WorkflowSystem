<style>
.btn-collapse {
    text-align: right;
}
</style>
@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

        <div class="title-header">จัดการข้อมูลพนักงาน</div>

            <div class="btn-collapse">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse"
                    aria-expanded="false" aria-controls="collapse">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>เพิ่มข้อมูลพนักงาน
                </button>
            </div>
            <div class="collapse" id="collapse">

                <form action="#" id="f-employee">
                    <div class="group_data">



                        <div class="col-md-12">
                            <div class="title-form">
                                ข้อมูลพนักงาน
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                คำนำหน้า <b class="request-data">**</b> / ชื่อ - สกุล <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-2">
                                <select name="titlename" id="titlename" class="form-control" >
                                    <option value="">-- Please Select --</option>
                                    @foreach ($titlenames as $item)
                                    <option value="{{ $item->code_lookup }}">{{ $item->value_lookup }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="name" id="name" class="form-control" >
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="lastname" id="lastname" class="form-control" >
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ที่อยู่ <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <textarea name="address" id="address" class="form-control" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                เลขที่บัตรประชาชน <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="id_card" id="id_card" class="form-control" >
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ประเภทพนักงาน <b class="request-data">**</b> / รหัสพนักงาน :
                            </div>
                            <div class="col-md-2">
                                <select name="employee_type" id="employee_type" class="form-control" >
                                    <option value="">-- Please Select --</option>
                                </select>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="employee_code" disabled id="employee_code" class="form-control">
                            </div>

                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                E-mail <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="email" id="email" class="form-control" >
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                หมายเลขโทรศัพท์ <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="phone" id="phone" class="form-control" >
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                เงินเดือน <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="salary" id="salary" class="form-control" >
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                Department <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <select name="department" id="department" class="form-control" >
                                    <option value="">-- Please Select --</option>
                                </select>
                            </div>
                        </div>

                        <div class="menu-action col-md-12">
                            <input id="save-data" type="button" class="btn btn-primary" value="บันทึกข้อมูล"/>
                            <input id="cancel-data" type="button" class="btn btn-danger" value="ยกเลิก" />
                        </div>

                    </div>
                </form>
            </div>
            <div class="card mt-2">
                <section class="m-2">
                    <div class="col-md-12 table-responsive">
                        {!! $dataTable->table() !!}
                    </div>
                </section>
                {!! $dataTable->scripts() !!}
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
$('#f-employee').submit(function($this) {
    var settings = {
        "url": "{{url('api/employee')}}",
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        "data": {
            "titlename": $("select[name~='titlename']").val() == "" ? "" : $("select[name~='titlename']")
                .val(),
            "name": $("input[name~='name']").val(),
            "lastname": $("input[name~='lastname']").val(),
            "address": $("input[name~='address']").val(),
            "id_card": $("input[name~='id_card']").val(),
            "employee_code": $("input[name~='employee_code']").val(),
            "employee_type": $("input[name~='employee_type']").val(),
            "email": $("input[name~='email']").val(),
            "phone": $("input[name~='phone']").val(),
            "salary": $("input[name~='salary']").val(),
            "department": $("input[name~='department']").val(),
            "created_by": '{{ Auth::user()->name }}',
            "updated_by": '{{ Auth::user()->name }}'

            // "titlename": "a",
            // "name": "a",
            // "lastname": "a",
            // "address": "a",
            // "id_card": "a",
            // "employee_code": "a",
            // "employee_type": "a",
            // "email": "a",
            // "phone": "a",
            // "salary": "10",
            // "department": "a",
            // "created_by": "admin",
            // "updated_by": "admin"
        }
    };

    console.log(settings);

    $.ajax(settings).done(function(response) {
        console.log(response);
    });
});
</script>

@endsection