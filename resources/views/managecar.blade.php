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
                    <div class="form-group">
                        <label for="label-listCar">วันที่เข้ารับสินค้า</label>
                        <input type="text" class="form-control datepicker" name="date_selected">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="label-listOrder">ออเดอร์</label>
                    <div class="input-group">
                        <select class="form-control" name="listOrder"></select>
                        <span class="input-group-append">
                            <button type="button" name="btn-add-car-order" class="btn btn-success btn-flat">เพิ่ม</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table id="table-car" class="table">
                        <thead>
                            <tr>
                                <th>รถ</th>
                                <th>ออเดอร์</th>
                                <th>สถานะออเดอร์</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: left;">
                    <button type="button" name="btn-submit-car-order" class="btn btn-success">บันทึกข้อมูล</button>
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
                    <table id="table-product" class="table">
                        <thead>
                            <tr>
                                <th>เลขที่เอกสาร</th>
                                <th>ประเภทรถ</th>
                                <th>ทะเบียนรถ</th>
                                <th>คนขับ</th>
                                <th>วันที่เข้ารับสินค้า</th>
                                <th>ผู้สร้าง</th>
                                <th>สถานะ</th>
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
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
                            </tr> --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-nowrap{
        white-space: nowrap
    }
</style>

<script>

    let arrayOrder = [];
    let listProductDetail;
    let listProduct;

    $(document).ready(function() {
        init();
        handle();
    });

    async function init() {
        await ListCar();
        await ListOrder();
        await ListOrderProductDetail();
        await ListOrderProduct();
        await showDatatable();
    }

    async function handle() {
        $('[name="btn-add-car-order"]').on('click',async function(){
            console.log("btn-add-car-order Click !!");
            const car_id = $("[name=listCar]").val();
            const car_text = $("[name=listCar] option:selected").text();
            const order_id = $("[name=listOrder]").val();
            const order_text = $("[name=listOrder] option:selected").text();
            const date_selected = dateToDatabase($("[name=date_selected]").val());
            let array_car = car_id.split(',');
            array_car[1] = array_car[1] == "null" ? null : array_car[1];
            if(array_car[0] != "" && order_id != "" && array_car[1]){
                const find = arrayOrder.find(item => item.car == array_car[0] && item.order == order_id);
                const find2 = listProductDetail.find(item => item.order_id == order_id);
                if(!find){
                    arrayOrder.push({
                        car: array_car[0],
                        car_text: car_text, 
                        order: order_id,
                        order_text: order_text,
                        employee: array_car[1],
                        ismain: !find2 ? true : false,
                        date: date_selected
                    });
                    console.log(arrayOrder);
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
            const arr_data = carId.split(',');
            await $.post('/api/getproductdetail',{car_id: arr_data[0]},async function(res,status){
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

    async function ListCar() {
        await $.get('/api/cars',function (res) {
            const { data } = res;
            if(data){
                const option = $("<option selected>").val('').text('-- กรุณาเลือกรถ --');
                $('[name="listCar"]').append(option);
                data.forEach(item => {
                    const opt = $("<option>").val(item.car_id+","+item.employee_id).text(item.regis_id+" - "+item.car_brand);
                    $('[name="listCar"]').append(opt);
                });
            }
        });
    }

    async function ListOrder(){
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
            if ($.fn.dataTable.isDataTable('#table-car')) {
                $('#table-car').DataTable().destroy();
            }
        }
        $('#table-car').dataTable({
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
                        return "<td>"+ data.ismain ? "หลัก" : "รอง" +"</td>";
                    }
                },
                {
                    data: null,
                    render:function(data,type,row){
                        return "<td><span class='btn btn-danger btn-sm' onclick='manage_delete(\""+data.order+"\")'>ลบ</span></td>";
                    }
                }
            ]
        });
    }

    async function showDatatableProduct() {
        if(listProduct.length > 0){
            if ($.fn.dataTable.isDataTable('#table-product')) {
                $('#table-product').DataTable().destroy();
            }
        }
        $('#table-product').dataTable({
            processing: true,
            responsive: true,
            destroy: true,
            data: listProduct,
            columns:[
                {data: "product_id"},
                {data: "car_type"},
                {data: "regis_id"},
                {data: "fullname"},
                {data: "pickup_date"},
                {data: "created_by"},
                {data: "on_status"},
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
        let ismain_str = ""
        let employee_str = "";
        let date_str = "";
        let by_str = "";
        arrayOrder.forEach(item =>{
            car_str += item.car.trim()+",";
            order_str += item.order.trim()+",";
            ismain_str += item.ismain ? 1+"," : 0 +",";
            employee_str += item.employee.trim()+",";
            date_str += item.date.trim()+",";
            by_str += "{{ Auth::user()->name }},";
        });

        const jsonData = {
            car: car_str,
            order: order_str,
            ismain: ismain_str,
            employee: employee_str,
            date: date_str,
            by: by_str
        }

        $.post('/api/addcarorder',jsonData,
        function(res,status){
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

    async function ListOrderProductDetail(){
        $.get('/api/listorderproductdetail',function(res,status){
            const { data } = res;
            listProductDetail = data;
        });
    }

    async function ListOrderProduct(){
        $.get('/api/listorderproduct',function(res,status){
            const { data } = res;
            listProduct = data;
            showDatatableProduct();
        });
    }

    function dateToDatabase(data){
        const date = data.split('/');
        const year = Number(date[2]);
        const month = date[1]
        const day = date[0];
        return year+"/"+month+"/"+day;
    }
</script>

@endsection