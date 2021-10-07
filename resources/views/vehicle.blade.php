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
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                รหัสรถ :
                            </div>
                            <div class="col-md-9">
                                <input type="text" disabled name="car_id" id="car_id" class="form-control">
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
                                <select name="car_plate" id="car_plate" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    @foreach ($tb_customer as $item)
                                    <option value="{{$item->customer_id}}">{{$item->customer_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="menu-action col-md-12">
                        <input id="save-data" type="button" class="btn btn-primary" value="บันทึกข้อมูล" />
                        <input id="cancel-data" type="button" class="btn btn-danger" value="ยกเลิก" />
                    </div>

                </form>

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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="m-f-vehicle">
                    <div class="group_data">
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
                                <input type="text" disabled name="car_id" id="car_id" class="form-control">
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
                                <select name="car_plate" id="car_plate" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    @foreach ($tb_customer as $item)
                                    <option value="{{$item->customer_id}}">{{$item->customer_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
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
    "car_plate": "",
    "created_by": '{{ Auth::user()->name }}',
    "updated_by": '{{ Auth::user()->name }}'
}

function onEdit(id, name) {
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
                });
            }
        },
    });
}

function onDelete(id, name) {
    const isPost = confirm("ต้องการลบข้อมูลพนักงานชื่อ " + name);
    if (isPost) {
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
    }
}

function BtnSave() {
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
}

function BtnEdit() {
    let isPost = true;
    $('#m-f-employee').find('select,input,textarea').each(function(i, box) {
        const name = $(box).attr('name');
        if (name) {
            console.log(name);
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
}
</script>

@endsection