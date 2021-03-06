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
                                <select name="titlename" id="titlename" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    @foreach ($titlenames as $item)
                                    <option value="{{ $item->code_lookup }}">{{ $item->value_lookup }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="lastname" id="lastname" class="form-control">
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
                                <input type="number" name="id_card" id="id_card" class="form-control">
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ประเภทพนักงาน <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-2">
                                <select name="employee_type" id="employee_type" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    @foreach ($employeetype as $item)
                                    <option value="{{ $item->code_lookup }}">{{ $item->value_lookup }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-7">
                                @foreach ($employeeno as $item)
                                <input type="text" name="employee_id" style="display:none;" disabled id="employee_id"
                                    class="form-control" value="{{ $item->runno }}">
                                @endforeach
                            </div>

                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                E-mail <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                หมายเลขโทรศัพท์ <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <input type="number" name="phone" id="phone" class="form-control">
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                เงินเดือน <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <input type="number" step="0.01" name="salary" id="salary" class="form-control">
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                Department <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <select name="department" id="department" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    @foreach ($department as $item)
                                    <option value="{{ $item->code_lookup }}">{{ $item->value_lookup }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="menu-action col-md-12">
                            <input id="save-data" type="button" class="btn btn-primary" onclick="BtnSave(); false"
                                value="บันทึกข้อมูล" />
                            <input id="cancel-data" type="button" class="btn btn-danger" value="ยกเลิก" />
                        </div>

                    </div>
                </form>
            </div>
            {{-- <div class="card mt-2">
                <section class="m-2">
                    <div class="col-md-12 table-responsive">
                        {!! $dataTable->table() !!}
                    </div>
                </section>
                {!! $dataTable->scripts() !!}
            </div> --}}
            <div class="card mt-2">
                <section class="m-2">
                    <div class="com-md-12 table-responsive">
                        <table id="table-employee" class="table dataTable">
                            <thead>
                                <th>ชื่อ-นามสกุล</th>
                                <th>อีเมล์</th>
                                <th>หมายเลขโทรศัพท์</th>
                                <th>เงินเดือน</th>
                                <th>ประเภทพนักงาน</th>
                                <th>หน่วยงาน</th>
                                <th>#</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </section>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="m-f-employee">
                    {{-- <div class="group_data"> --}}
                    <input type="hidden" name="m-id" id="m-id" value="">
                    <div class="row col-md-12">
                        <div class="col-md-3">
                            คำนำหน้า <b class="request-data">**</b> / ชื่อ - สกุล <b class="request-data">**</b> :
                        </div>
                        <div class="col-md-2">
                            <select name="m-titlename" id="m-titlename" class="form-control">
                                <option value="">-- Please Select --</option>
                                @foreach ($titlenames as $item)
                                <option value="{{ $item->code_lookup }}">{{ $item->value_lookup }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="m-name" id="m-name" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="m-lastname" id="m-lastname" class="form-control">
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            ที่อยู่ <b class="request-data">**</b> :
                        </div>
                        <div class="col-md-9">
                            <textarea name="m-address" id="m-address" class="form-control" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            เลขที่บัตรประชาชน <b class="request-data">**</b> :
                        </div>
                        <div class="col-md-9">
                            <input type="number" name="m-id_card" id="m-id_card" class="form-control">
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            ประเภทพนักงาน <b class="request-data">**</b> / รหัสพนักงาน :
                        </div>
                        <div class="col-md-2">
                            <select name="m-employee_type" id="m-employee_type" class="form-control">
                                <option value="">-- Please Select --</option>
                                @foreach ($employeetype as $item)
                                <option value="{{ $item->code_lookup }}">{{ $item->value_lookup }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-7">
                            @foreach ($employeeno as $item)
                            <input type="text" name="m-employee_id" disabled id="m-employee_id" class="form-control"
                                value="">
                            @endforeach
                        </div>

                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            E-mail <b class="request-data">**</b> :
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="m-email" id="m-email" class="form-control">
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            หมายเลขโทรศัพท์ <b class="request-data">**</b> :
                        </div>
                        <div class="col-md-9">
                            <input type="number" name="m-phone" id="m-phone" class="form-control">
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            เงินเดือน <b class="request-data">**</b> :
                        </div>
                        <div class="col-md-9">
                            <input type="number" step="0.01" name="m-salary" id="m-salary" class="form-control">
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            Department <b class="request-data">**</b> :
                        </div>
                        <div class="col-md-9">
                            <select name="m-department" id="m-department" class="form-control">
                                <option value="">-- Please Select --</option>
                                @foreach ($department as $item)
                                <option value="{{ $item->code_lookup }}">{{ $item->value_lookup }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button id="save-data" type="button" class="btn btn-primary btn-sm"
                    onclick="BtnEdit(); false">บันทึกข้อมูล</button>
                <button id="cancel-data" type="button" class="btn btn-danger btn-sm"
                    data-dismiss="modal">ยกเลิก</button>
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>



const jsonFormat = {
    "titlename": "",
    "name": "",
    "lastname": "",
    "address": "",
    "id_card": "",
    "employee_type": "",
    "employee_id": "",
    "email": "",
    "phone": "",
    "salary": "",
    "department": "",
    "created_by": '{{ Auth::user()->name }}',
    "updated_by": '{{ Auth::user()->name }}'
}

$(document).ready(async function(){
    await getEmployee();
});

async function getEmployee(){
    const { data } = await $.get('/api/employee/list');
    ListEmployee(data);
}

async function ListEmployee(data) {
    if ($.fn.dataTable.isDataTable('#table-employee')) {
        $('#table-employee').DataTable().destroy();
    }
    $('#table-employee').dataTable({
        // ajax:{
        //     url: "/api/expenses/listproduct",
        //     type: "get"
        // },
        data: data,
        processing: true,
        destroy: true,
        columns:[
            {data: "fullname",className:"text-nowrap"},
            {data: "email"},
            {data: "phone"},
            {data: "salary"},
            {data: "employee_type"},
            {data: "department"},
            {
                data: null,
                render:function(data,type,row){
                    return '<div onClick="onEdit('+data.id+',\'view\');" class="btn btn-sm btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">View</div>&nbsp;<div onClick="onEdit('+data.id+',\'edit\');" class="btn btn-sm btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Edit</div>&nbsp;<div onClick="onDelete('+data.id+',\''+data.fullname+'\');" class="btn btn-sm btn-danger btn-sm">Delete</div>';
                },
                className:"text-nowrap"
            }
        ]
    });
}

function onEdit(id,isView) {

    if(isView == "view"){
        $('.modal-footer').prop("class","modal-footer d-none");
    }else{
        $('.modal-footer').prop("class","modal-footer");
    }

    $.ajax({
        url: "{{url('api/employee')}}/" + id,
        type: "GET",
        data: {},
        success: function(response, status) {
            if (response) {
                $('[name=m-id]').val(id);
                const data = response.data;
                $.each(jsonFormat, function(key, value) {
                    $('[name=m-' + key + ']').val(data[key]);
                    if(isView == "view"){
                        $('[name=m-' + key + ']').prop("disabled",true);
                    }else{
                        $('[name=m-' + key + ']').prop("disabled",false);
                    }
                });
            }
        },
    });
}

function onDelete(id, name) {

    swal({
        title: "",
        text: "คุณแน่ใจว่าต้องการลบข้อมูลพนักงานของ " + name,
        icon: "warning",
        buttons: {
            confirm: true,
            cancel: true,
        },
        infoMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {

            $.ajax({
                url: "{{url('api/employee')}}/" + id,
                type: "DELETE",
                data: {},
                success: function(response, status) {
                    if (status == "success") {
                        window.location.href = "{{ url('/employee') }}";
                    }
                },
            });

        } else {
            return false;
        }
    });
}

function BtnSave() {

    swal({
        title: "",
        text: "คุณแน่ใจว่าต้องการบันทึกข้อมูลพนักงานนี้ ?",
        icon: "warning",
        buttons: {
            confirm: true,
            cancel: true,
        },
        infoMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {


            let isPost = true;
            $('#f-employee').find('select,input,textarea').each(function(i, box) {
                const name = $(box).attr('name');
                if (name) {
                    if ($('[name=' + name + ']').val().trim() == "") {
                        isPost = false;
                        $('[name=' + name + ']').focus();
                    };
                    jsonFormat[name] = $('[name=' + name + ']').val();
                }
            });

            if (isPost) {
                $.ajax({
                    url: "{{url('api/employee')}}",
                    type: "POST",
                    data: jsonFormat,
                    success: function(response, status) {
                        if (status == "success") {
                            window.location.href = "{{ url('/employee') }}";
                        }
                    },
                });
            }

        } else {
            return false;
        }
    });

}

function BtnEdit() {

    swal({
        title: "",
        text: "คุณแน่ใจว่าต้องการแก้ไขข้อมูลพนักงาน ?",
        icon: "warning",
        buttons: {
            confirm: true,
            cancel: true,
        },
        infoMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {

            let isPost = true;
            $('#m-f-employee').find('select,input,textarea').each(function(i, box) {
                const name = $(box).attr('name');
                if (name) {
                    if ($('[name=' + name + ']').val().trim() == "") {
                        isPost = false;
                        $('[name=' + name + ']').focus();
                    };
                    const nameFormat = name.replace('m-', '')
                    jsonFormat[nameFormat] = $('[name=' + name + ']').val();
                }
            });

            const id = $('[name=m-id]').val();
            if (isPost) {
                $.ajax({
                    url: "{{url('api/employee')}}/" + id,
                    type: "PUT",
                    data: jsonFormat,
                    success: function(response, status) {
                        if (status == "success") {
                            window.location.href = "{{ url('/employee') }}";
                        }
                    },
                });
            }

        } else {
            return false;
        }
    });

}
</script>

@endsection
