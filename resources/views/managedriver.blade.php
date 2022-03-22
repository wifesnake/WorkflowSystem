@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="title-header">จัดการข้อมูลคนขับรถ</div>
            <div class="row">
                <div class="container">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee">พนักงานขับรถ</label>
                                    <select name="listemployee" class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee">รถสำหรับขนส่ง</label>

                                    <div class="input-group">
                                        <select name="listcar" id="" class="form-control"></select>
                                        <span class="input-group-append">
                                            <button type="button" name="btn-add-employee-car" class="btn btn-success">บันทึกข้อมูล</button>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div>
                    <table id="table-employeecar" class="table datatable">
                        <thead>
                            <tr>
                                <th>พนักงาน</th>
                                <th>รถสำหรับขนส่ง</th>
                                <th>วันที่สร้าง</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let list_employee_car = [];
    $(document).ready(function() {
        init();
        $('[name="btn-add-employee-car"]').on('click',function() {
            const employee = $('[name="listemployee"]').val();
            const car = $('[name="listcar"]').val();
            if(employee != "" && car != ""){
                $.post('/api/addemployeecar',{
                    employee: employee, 
                    car: car, 
                    created_by: '{{ Auth::user()->name }}',
                    updated_by: '{{ Auth::user()->name }}'
                },function(res,status){
                    $(document).Toasts('create', {
                        title: status,
                        body: res.message,
                        autohide: true,
                        delay: 3000,
                        fade: true,
                        class: "bg-success"
                    });
                    listEmployeeCar();
                });
            }else{
                $(document).Toasts('create', {
                    title: 'unsuccess',
                    body: "กรุณาเลือกพนักงานหรือรถ",
                    autohide: true,
                    delay: 3000,
                    fade: true,
                    class: "bg-danger"
                });
            }
        });
    });

    async function init() {
        await getListDriver();
        await getListCar();
        await listEmployeeCar();
    }

    async function getListDriver() {
        await $.get('/api/driver',function (res) {
            const { data } = res;
            if(data){
                const option = $("<option selected>").val('').text('-- กรุณาเลือกพนักงาน --');
                $('[name="listemployee"]').append(option);
                data.forEach(item => {
                    const opt = $("<option>").val(item.employee_id).text(item.fullname + " (" + item.employee_id + ")");
                    $('[name="listemployee"]').append(opt);
                });
            }
        });
    }

    async function getListCar() {
        await $.get('/api/car',function (res) {
            const { data } = res;
            if(data){
                const option = $("<option selected>").val('').text('-- กรุณาเลือกรถ --');
                $('[name="listcar"]').append(option);
                data.forEach(item => {
                    const opt = $("<option>").val(item.car_id).text(item.regis_id+" ("+item.car_brand + ")");
                    $('[name="listcar"]').append(opt);
                });
            }
        });
    }

    async function listEmployeeCar(){
        $('#table-employeecar').DataTable({
            "ajax":{
                url: "/api/listemployeecar",
                type: "get"
                // data: {
                //     role: "{{Auth::user()->is_admin}}"
                // }
            },
            "processing": true,
            "responsive": true,
            "order": [[ 2, "desc" ]],
            "columns": [
                {
                    data: null,
                    render:function(data,type,row){
                        return data.employee_id +" - "+data.name+" "+data.lastname;
                    }
                },
                {
                    data: null,
                    render:function(data,type,row){
                        return data.regis_id+" - "+data.car_brand;
                    }
                },
                { data: "created_at" }
            ]
        });
    }

</script>

@endsection