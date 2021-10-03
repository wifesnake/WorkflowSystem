@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card mt-2">
                    <section class="m-2">
                        <div class="com-md-12">
                            <label>เพิ่มข้อมูลพนักงาน</label>
                        </div>
                        <form action="#" id="f-employee">
                            <div class="com-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Titlename</label>
                                            <select name="titlename" id="titlename" class="form-control" required>
                                                <option value="">-- Please Select --</option>
                                                @foreach ($titlenames as $item)
                                                    <option value="{{ $item->code_lookup }}">{{ $item->value_lookup }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lastname">Lastname</label>
                                            <input type="text" name="lastname" id="lastname" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="com-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" id="address" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="id_card">Card id</label>
                                            <input type="text" name="id_card" id="id_card" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="employee_code">Employee code</label>
                                            <input type="text" name="employee_code" id="employee_code" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="com-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="employee_type">Employee type</label>
                                            <input type="text" name="employee_type" id="employee_type" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" id="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="com-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="salary">Salary</label>
                                            <input type="text" name="salary" id="salary" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="department">Department</label>
                                            <input type="text" name="department" id="department" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="com-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="card mt-2">
                    <section class="m-2">
                        <div class="com-md-12 table-responsive">
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
    $('#f-employee').submit(function($this){
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

        $.ajax(settings).done(function (response) {
            console.log(response);
        });
    });
</script>

@endsection
