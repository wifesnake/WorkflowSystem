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
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" required>
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
                                            <input type="number" name="salary" id="salary" class="form-control" required>
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
                                <div class="row">
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
            "url": "http://127.0.0.1:8000/api/employee",
            "method": "POST",
            "timeout": 0,
            "headers": {
            "Content-Type": "application/x-www-form-urlencoded"
            },
            "data": {
                "name": $("input[name~='name']").val(),
                "email": $("input[name~='email']").val(),
                "phone": $("input[name~='phone']").val(),
                "salary": $("input[name~='salary']").val(),
                "department": $("input[name~='department']").val()
            }
        };

        $.ajax(settings).done(function (response) {
            console.log(response);
        });
    });
</script>

@endsection
