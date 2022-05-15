@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="title-header">จัดการข้อมูลรถ</div>

            <div class="btn-collapse">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse"
                    aria-expanded="false" aria-controls="collapse">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>เพิ่มข้อมูลรถ
                </button>
            </div>
            <div class="collapse" id="collapse">

                <form action="#" id="f-vehicle">

                    <div class="group_data">
                        <div class="col-md-12">
                            <div class="title-form">
                                ข้อมูลรถ
                            </div>
                        </div>
                        <div style="display:none;" class="row col-md-12">
                            <div class="col-md-3">
                                รหัสรถ :
                            </div>
                            <div class="col-md-9">
                                <!-- <input type="text" disabled name="car_id" id="car_id" class="form-control"> -->
                                @foreach ($vehicleno as $item)
                                <input type="text" name="car_id" disabled id="car_id" class="form-control"
                                    value="{{ $item->runno }}">
                                @endforeach
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ทะเบียน <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="regis_id" id="regis_id" class="form-control">
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                รุ่นรถ <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <textarea name="car_brand" id="car_brand" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ประเภทของรถ <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <select name="isTrucktype" id="isTrucktype" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    @foreach ($vehicletype as $item)
                                    <option value="{{$item->code_lookup}}">{{$item->value_lookup}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ประเภทการใช้งาน <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <select name="cartype" id="cartype" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    @foreach ($usevehicle as $item)
                                    <option value="{{$item->code_lookup}}">{{$item->value_lookup}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                สถานที่ใช้งานรถ (ตามข้อมูลลูกค้า) <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <select name="car_location" id="car_location" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    @foreach ($tb_customer as $item)
                                    <option value="{{$item->customer_id}}">{{$item->customer_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="menu-action col-md-12">
                        <input id="save-data" type="button" class="btn btn-primary" onclick="BtnSave(); false"
                            value="บันทึกข้อมูล" />
                        <input id="cancel-data" type="button" class="btn btn-danger" value="ยกเลิก" />
                    </div>

                </form>

            </div>

            {{-- <div class="card mt-2">
                <section class="m-2">
                    <div class="com-md-12 table-responsive">
                        {!! $dataTable->table() !!}
                    </div>
                </section>
                {!! $dataTable->scripts() !!}
            </div> --}}
            <div class="card mt-2">
                <section class="m-2">
                    <div class="com-md-12 table-responsive">
                        <table id="table-vehicle" class="table dataTable">
                            <thead>
                                <th>รหัสรถ</th>
                                <th>หมายเลขทะเบียน</th>
                                <th>รายละเอียดรถ</th>
                                <th>สถานที่ใช้งาน</th>
                                <th>ประเภทรถ</th>
                                <th>สถานะของรถ</th>
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
                <input type="hidden" name="m-id" id="m-id" value="">
                <form action="#" id="m-f-vehicle">
                    {{-- <div class="group_data"> --}}
                        <div class="col-md-12">
                            <div class="title-form">
                                ข้อมูลรถ
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                รหัสรถ :
                            </div>
                            <div class="col-md-9">
                                <input type="text" disabled name="m-car_id" id="m-car_id" class="form-control">
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ทะเบียน <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="m-regis_id" id="m-regis_id" class="form-control">
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                รุ่นรถ <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <textarea name="m-car_brand" id="m-car_brand" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ประเภทของรถ <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <select name="m-isTrucktype" id="m-isTrucktype" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    @foreach ($vehicletype as $item)
                                    <option value="{{$item->code_lookup}}">{{$item->value_lookup}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ประเภทการใช้งาน <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <select name="m-cartype" id="m-cartype" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    @foreach ($usevehicle as $item)
                                    <option value="{{$item->code_lookup}}">{{$item->value_lookup}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                สถานที่ใช้งานรถ (ตามข้อมูลลูกค้า) <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <select name="m-car_location" id="m-car_location" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    @foreach ($tb_customer as $item)
                                    <option value="{{$item->customer_id}}">{{$item->customer_name}}</option>
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
    "car_id": "",
    "regis_id": "",
    "car_brand": "",
    "isTrucktype": "",
    "cartype": "",
    "car_location": "",
    "created_by": '{{ Auth::user()->name }}',
    "updated_by": '{{ Auth::user()->name }}'
}

$(document).ready(async function(){
    await getVehicle();
});

async function getVehicle(){
    const { data } = await $.get('/api/vehicle/list');
    ListVehicle(data);
}

async function ListVehicle(data) {
    if ($.fn.dataTable.isDataTable('#table-vehicle')) {
        $('#table-vehicle').DataTable().destroy();
    }
    $('#table-vehicle').dataTable({
        // ajax:{
        //     url: "/api/expenses/listproduct",
        //     type: "get"
        // },
        data: data,
        processing: true,
        destroy: true,
        columns:[
            {data: "car_id",className:"text-nowrap"},
            {data: "regis_id"},
            {data: "car_brand"},
            {data: "customer_name"},
            {data: "vehicletype"},
            {data: "cartype"},
            {
                data: null,
                render:function(data,type,row){
                    return '<div onClick="onEdit('+data.id+',\'view\');" class="btn btn-sm btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">View</div>&nbsp;<div onClick="onEdit('+data.id+',\'edit\');" class="btn btn-sm btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Edit</div>&nbsp;<div onClick="onDelete('+data.id+',\''+data.regis_id+'\');" class="btn btn-sm btn-danger btn-sm">Delete</div>';
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
        url: "{{url('api/vehicle')}}/" + id,
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
        text: "คุณแน่ใจว่าต้องการลบข้อมูลรถทะเบียน " + name,
        icon: "warning",
        buttons: {
            confirm: true,
            cancel: true,
        },
        infoMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {

            $.ajax({
                url: "{{url('api/vehicle')}}/" + id,
                type: "DELETE",
                data: {},
                success: function(response, status) {
                    if (status == "success") {
                        window.location.href = "{{ url('/vehicle') }}";
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
        text: "คุณแน่ใจว่าต้องการบันทึกข้อมูลรถคันนี้ ?",
        icon: "warning",
        buttons: {
            confirm: true,
            cancel: true,
        },
        infoMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {


            let isPost = true;
            $('#f-vehicle').find('select,input,textarea').each(function(i, box) {
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
                    url: "{{url('api/vehicle')}}",
                    type: "POST",
                    data: jsonFormat,
                    success: function(response, status) {
                        if (status == "success") {
                            window.location.href = "{{ url('/vehicle') }}";
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
        text: "คุณแน่ใจว่าต้องการแก้ไขข้อมูลนี้ ?",
        icon: "warning",
        buttons: {
            confirm: true,
            cancel: true,
        },
        infoMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {

            let isPost = true;
            $('#m-f-vehicle').find('select,input,textarea').each(function(i, box) {
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
                    url: "{{url('api/vehicle')}}/" + id,
                    type: "PUT",
                    data: jsonFormat,
                    success: function(response, status) {
                        if (status == "success") {
                            window.location.href = "{{ url('/vehicle') }}";
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
