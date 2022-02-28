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

                <div class="col">
                    <button type="button" name="btn-add-car-order" class="btn btn-success">เพิ่ม</button>
                </div>

            </div>

            <div class="row">
                <div class="col" style="text-align: right;">
                    <button type="button" name="btn-submit-car-order" class="btn btn-success">บันทึกข้อมูล</button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table id="table-car" class="table datatable">
                        <thead>
                            <tr>
                                <th>รถ</th>
                                <th>ออเดอร์</th>
                                <th>สถานะออเดอร์</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1กก553</td>
                                <td>VC0000001</td>
                                <td>หลัก</td>
                                <td>
                                    <button type="button" name="btn-submit-car-order" class="btn btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td>1กก553</td>
                                <td>VC0000002</td>
                                <td>หลัก</td>
                                <td>
                                    <button type="button" name="btn-submit-car-order" class="btn btn-danger">ลบ</button>
                                </td>
                            </tr>
                            <tr>
                                <td>1กก553</td>
                                <td>VC0000003</td>
                                <td>รอง</td>
                                <td>
                                    <button type="button" name="btn-submit-car-order" class="btn btn-danger">ลบ</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <hr>
            <div class="title-header">สถานะ Product_ID</div>
            <div class="row">
                <div class="col">
                    <table id="table-car" class="table datatable">
                        <thead>
                            <tr>
                                <th>เลขที่เอกสาร</th>
                                <th>ประเภทรถ</th>
                                <th>ทะเบียนรถ</th>
                                <th>คนขับ</th>
                                <th>วันที่เข้ารับสินค้า</th>
                                <th>ผู้สร้าง</th>
                                <th>สถานะ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PRODUCTID_001</td>
                                <td>รถบรรทุก 6 ล้อ</td>
                                <td>1กก553</td>
                                <td>ยงยุทธ เลิศธิราวงศ์</td>
                                <td>20/02/2565</td>
                                <td>ยงยุทธ เลิศธิราวงศ์</td>
                                <td>Perpare</td>
                                <td>
                                    <button type="button" name="btn-add-car-order" class="btn btn-info">ส่งข้อมูล (เพิ่มระบุค่าใช้จ่าย)</button>
                                </td>
                            </tr>

                            <tr>
                                <td>PRODUCTID_002</td>
                                <td>รถบรรทุก 10 ล้อ</td>
                                <td>1กก5538</td>
                                <td>ยงยุทธ2</td>
                                <td>20/02/2565</td>
                                <td>ยงยุทธ เลิศธิราวงศ์</td>
                                <td>Pending</td>
                                <td>
                                    <button type="button" name="btn-add-car-order" disabled class="btn btn-info">ส่งข้อมูล (เพิ่มระบุค่าใช้จ่าย)</button>
                                </td>
                            </tr>

                            <tr>
                                <td>PRODUCTID_003</td>
                                <td>รถบรรทุก 10 ล้อ</td>
                                <td>1กก5537</td>
                                <td>ยงยุทธ3</td>
                                <td>20/02/2565</td>
                                <td>ยงยุทธ เลิศธิราวงศ์</td>
                                <td>Pending</td>
                                <td>
                                    <button type="button" name="btn-add-car-order" disabled class="btn btn-info">ส่งข้อมูล (เพิ่มระบุค่าใช้จ่าย)</button>
                                </td>
                            </tr>

                            <tr>
                                <td>PRODUCTID_004</td>
                                <td>รถบรรทุก 10 ล้อ</td>
                                <td>1กก5997</td>
                                <td>ยงยุทธ3</td>
                                <td>20/02/2565</td>
                                <td>ยงยุทธ เลิศธิราวงศ์</td>
                                <td>Close Job</td>
                                <td>
                                    <button type="button" name="btn-add-car-order" disabled class="btn btn-info">ส่งข้อมูล (เพิ่มระบุค่าใช้จ่าย)</button>
                                </td>
                            </tr>

                            <tr>
                                <td>PRODUCTID_005</td>
                                <td>รถบรรทุก 10 ล้อ</td>
                                <td>1กก5227</td>
                                <td>ยงยุทธ3</td>
                                <td>20/02/2565</td>
                                <td>ยงยุทธ เลิศธิราวงศ์</td>
                                <td>ระบุค่าใช้จ่ายแล้ว</td>
                                <td>
                                    <button type="button" name="btn-add-car-order" disabled class="btn btn-info">ส่งข้อมูล (เพิ่มระบุค่าใช้จ่าย)</button>
                                </td>
                            </tr>

                        </tbody>
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
            if(car_id != "" && order_id != ""){
                const find = arrayOrder.find(item => item.car == car_id && item.order == order_id);
                if(!find){
                    arrayOrder.push({car: car_id,car_text: car_text, order: order_id,order_text: order_text});
                    await showDatatable();
                }
            }
        });

        $('[name="btn-submit-car-order"]').on('click',function(){
            btnSave();
        });

        $('[name="listCar"]').on('change',async function(){
            const selected = $(this);
            const carId = selected.val();
            await $.post('/api/listcarorder',{car_id: carId},async function(res,status){
                const { data } = res;
                arrayOrder = await data.map(item =>{
                    return{
                        car: item.car_id,
                        car_text: item.regis_id+" - "+item.car_brand,
                        order: item.order_id,
                        order_text: item.order_id+" - "+item.to_name
                    }
                });
                await showDatatable();
            });
        });
    }

    async function getListCar() {
        await $.get('/api/cars',function (res) {
            const { data } = res;
            if(data){
                const option = $("<option selected>").val('').text('-- กรุณาเลือกรถ --');
                $('[name="listCar"]').append(option);
                data.forEach(item => {
                    const opt = $("<option>").val(item.car_id).text(item.regis_id+" - "+item.car_brand);
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
        if(arrayOrder.length > 0){
            if ($.fn.dataTable.isDataTable('.datatable')) {
                $('.datatable').DataTable().destroy();
            }
        }
        $('.datatable').dataTable({
            processing: true,
            responsive: true,
            destroy: true,
            data: arrayOrder,
            columns:[
                {data: "car_text"},
                {data: "order_text"},
                {
                    data: null,
                    render:function(data,type,row){
                        return "<td><span class='btn btn-danger' onclick='manage_delete(\""+data.order+"\")'><i class='fas fa-minus'></i></span></td>";
                    }
                }
            ]
        });
    }

    async function manage_delete(orderId){
        const mapList = [];
        await arrayOrder.forEach(item =>{
            if(item.order != orderId){
                mapList.push({...item});
            }
        });
        arrayOrder = mapList;
        await showDatatable();
    }

    async function btnSave(){
        let car_str = "";
        let order_str = "";
        arrayOrder.forEach(item =>{
            car_str += item.car+",";
            order_str += item.order+",";
        });
        car_str = car_str+"&";
        order_str = order_str+"&";
        car_str = car_str.replace(/,&/g,'');
        order_str = order_str.replace(/,&/g,'');

        $.post('/api/addcarorder',{
            car: car_str,
            order: order_str,
            by: '{{ Auth::user()->name }}'
        },function(res,status){
            const { success, message } = res;
            if(success){
                $(document).Toasts('create', {
                    title: status,
                    body: message,
                    autohide: true,
                    delay: 3000,
                    fade: true,
                    class: "bg-success"
                });
            }
        });
    }
</script>

@endsection