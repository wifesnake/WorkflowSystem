@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="menu-action col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            <form action="#" id="f-employee">
                <div class="group_data">
                    <div class="col-md-12">
                        <div class="title-form">
                            ข้อมูลพนักงาน
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-3">
                            คำนำหน้า / ชื่อ - สกุล :
                        </div>
                        <div class="col-md-1">
                            <select name="titlename" id="titlename" class="form-control" required>
                                <option value="">-- Please Select --</option>
                                @foreach ($titlenames as $item)
                                <option value="{{ $item->code_lookup }}">{{ $item->value_lookup }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="lastname" id="lastname" class="form-control" required>
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            ที่อยู่ :
                        </div>
                        <div class="col-md-9">
                            <textarea name="address" id="address" class="form-control" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            เลขที่บัตรประชาชน :
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="id_card" id="id_card" class="form-control" required>
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            ประเภทพนักงาน / รหัสพนักงาน :
                        </div>
                        <div class="col-md-2">
                            <select name="employee_type" id="employee_type" class="form-control" required>
                                <option value="">-- Please Select --</option>
                            </select>
                        </div>
                        <div class="col-md-7">
                            <input type="text" name="employee_code" id="employee_code" class="form-control"
                                required>
                        </div>

                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            E-mail :
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="email" id="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            หมายเลขโทรศัพท์ :
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            เงินเดือน :
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="salary" id="salary" class="form-control" required>
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            Department :
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="department" id="department" class="form-control" required>
                        </div>
                    </div>


                </div>
            </form>
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
    function onDelete(id,name){
        var result = confirm("Are you want to delete "+ name +" ?");
        if (result) {
            var settings = {
                "url": "{{url('api/employee')}}/"+id,
                "method": "DELETE",
                "timeout": 0,
                "headers": {
                "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {}
            };

            $.ajax(settings).done(function (response) {
                if(status=="success"){
                    window.location.href = "{{url('/employee')}}"
                }
            });
        }
    }

    // $('#f-employee').submit(function($this){
    function test(){
        var settings = {
            "url": "{{url('api/employee')}}",
            "method": "POST",
            "timeout": 0,
            "headers": {
            "Content-Type": "application/x-www-form-urlencoded"
            },
            "data": {
                "titlename": $("select[name~='titlename']").val()==""?"":$("select[name~='titlename']").val(),
                "name": $("input[name~='name']").val(),
                "lastname": $("input[name~='lastname']").val(),
                "address": $("input[name~='address']").val(),
                "id_card": $("input[name~='id_card']").val(),
                "employee_id": $("input[name~='employee_id']").val(),
                "employee_type": $("input[name~='employee_type']").val(),
                "email": $("input[name~='email']").val(),
                "phone": $("input[name~='phone']").val(),
                "salary": $("input[name~='salary']").val(),
                "department": $("input[name~='department']").val(),
                "created_by": '{{ Auth::user()->name }}',
                "updated_by": '{{ Auth::user()->name }}'
            }
        };

        $.ajax(settings).done(function (response,status) {
            if(status=="success"){
                window.location.href = "{{url('/employee')}}"
            }
        });
    // });
    }
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
