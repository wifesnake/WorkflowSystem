@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="title-header">จัดการรถ</div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label-listCar">รถ</label>
                        <select class="form-control" name="listCar"></select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="label-listOrder">ออเดอร์</label>
                    <div class="form-group">
                        <select class="form-control" name="listOrder"></select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" name="btn-add-car-order" class="btn btn-success">เพิ่ม</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <table id="table-car" class="table datatable">
                        <thead>
                            <tr>
                                <th>รถ</th>
                                <th>ออเดอร์</th>
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

    let arrayOrder = [];

    $(document).ready(function() {
        init();
        handle()
    });

    async function init() {
        await getListCar();
        await getListOrder();
        await showDatatable();
    }

    async function handle() {
        $('[name="btn-add-car-order"]').on('click',async function(){
            const car_id = $("[name=listCar]").val();
            const car_text = $("[name=listCar] option:selected").text();
            const order_id = $("[name=listOrder]").val();
            const order_text = $("[name=listOrder] option:selected").text();
            arrayOrder.push({car: car_id,car_text: car_text, order: order_id,order_text: order_text});
            await showDatatable();
        });
    }

    async function getListCar() {
        await $.get('/api/cars',function (res) {
            const { data } = res;
            if(data){
                const option = $("<option selected>").val('').text('-- กรุณาเลือกรถ --');
                $('[name="listCar"]').append(option);
                data.forEach(item => {
                    const opt = $("<option>").val(item.car_id).text(item.car_id+" - "+item.car_brand);
                    $('[name="listCar"]').append(opt);
                });
            }
        });
    }

    async function getListOrder(){
        await $.get('/api/listorder',function (res) {
            const { data } = res;
            if(data){
                const option = $("<option selected>").val('').text('-- กรุณาเลือกออเดอร์ --');
                $('[name="listOrder"]').append(option);
                data.forEach(item => {
                    const opt = $("<option>").val(item.order_id).text(item.order_id+" - "+item.to_name);
                    $('[name="listOrder"]').append(opt);
                });
            }
        });
    }

    async function showDatatable() {
        let html = "";
        arrayOrder.forEach(item =>{
            html += "<tr>";
            html += "<td>"+item.car_text+"</td>";
            html += "<td>"+item.order_text+"</td>";
            html += "</tr>";
        });
        $('#table-car > tbody').html(html);
    }
</script>

@endsection