@extends('layouts.master')

@section('content')
 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="title-header">จัดรถสำหรับส่งสินค้า</div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label-listCar">รถสำหรับส่งสินค้า</label>
                        <select class="form-control" name="listCar"></select>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="label-listOrder">ออเดอร์</label>
                    <div class="input-group">
                        <select class="form-control" name="listOrder"></select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label-listCar">วันที่เข้ารับสินค้า</label>
                        <div class="input-group">
                        <input type="text" class="form-control datepicker" name="date_selected">
                        <span class="input-group-append">
                            <button type="button" name="btn-add-car-order" class="btn btn-success btn-flat">เพิ่มข้อมูล</button>
                        </span>
                    </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12" style="text-align: right;">
                    <button type="button" name="btn-submit-car-order" class="btn btn-success">บันทึกข้อมูล</button>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table id="table-car" class="table">
                        <thead>
                            <tr>
                                <th>รถสำหรับส่งสินค้า</th>
                                <th>เลขที่ออเดอร์</th>
                                <th>สถานะออเดอร์</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <hr>
            <div class="title-header">รายการรถที่จัดออเดอร์แล้ว</div>
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

    button.btn.btn-info {
        color: white;
    }
</style>

<script>

    let arrayOrder = [];
    let listProductDetail = [];
    let listProduct;
    let ref_product_id;

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
            const car_id = $("[name=listCar]").val();
            const car_text = $("[name=listCar] option:selected").text();
            const order_id = $("[name=listOrder]").val();
            const order_text = $("[name=listOrder] option:selected").text();
            const date_selected = $("[name=date_selected]").val();
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
                        date: date_selected,
                        product_id: ""
                    });
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
                const mapList = await data.map(item =>{
                    return{
                        car: item.car_id,
                        car_text: item.regis_id+" - "+item.car_brand,
                        order: item.order_id,
                        order_text: item.order_id+" - "+item.to_name,
                        date: databaseToDate(item.date),
                        employee: item.employee,
                        ismain: item.ismainorder,
                        product_id: item.product_id
                    }
                });
                arrayOrder = mapList;
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
                    const opt = $("<option>").val(item.car_id+","+item.employee_id).text("" + item.regis_id+" ("+item.car_brand + ")");
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
                    const opt = $("<option>").val(item.order_id).text("" + item.order_id +" ( "+item.to_name + ")");
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
            "searching": false,
            "lengthChange": false,
            data: arrayOrder,
            columns:[
                {data: "car_text"},
                {data: "order_text"},
                {
                    data: null,
                    render:function(data,type,row){
                        const str = data.ismain == true || data.ismain == 'true' ? "หลัก" : "รอง";
                        return "<td>"+ str +"</td>";
                    }
                },
                {
                    data: null,
                    render:function(data,type,row){
                        return "<td><span class='btn btn-danger btn-sm' onclick='manage_delete(\""+data.order+"\",\""+data.product_id+"\")'>ลบ</span></td>";
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
                // {data: "on_status"},
                {
                    data:null,
                    render:function(data,type,row){
                        let str;
                        if(data.on_status_code != "01"){
                            str = '<td><button type="button" name="btn-add-car-order" class="btn btn-info" disabled>ส่งข้อมูล (เพิ่มระบุค่าใช้จ่าย)</button></td>'
                        }else{
                            str = '<td><button type="button" name="btn-add-car-order" class="btn btn-info" onClick="sendToNext(\''+ data.product_id +'\')">ส่งข้อมูล (เพิ่มระบุค่าใช้จ่าย)</button></td>'
                        }
                        return str;
                    }
                }
            ]
        });
    }

    async function manage_delete(orderId,product_id){
        const mapList = [];
        await arrayOrder.forEach(item =>{
            if(item.order != orderId){
                mapList.push({
                    ...item
                });
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
        let product_id_str = "";
        arrayOrder.forEach(item =>{
            car_str += item.car.trim()+",";
            order_str += item.order.trim()+",";
            ismain_str += item.ismain ? 1+"," : 0 +",";
            employee_str += item.employee.trim()+",";
            date_str += dateToDatabase(item.date.trim())+",";
            by_str += "{{ Auth::user()->name }},";
            const find = listProductDetail.find(it => it.car_id == item.car && it.employee == item.employee);
            product_id_str += find ? find.product_id+"," : ",";
            // product_id_str += listProductDetail.map(it => it.car_id == item.car && it.employee == item.employee /*&& it.order_id == item.order*/ ? it.product_id+"," : ",");
        });

        const jsonData = {
            car: car_str,
            order: order_str,
            ismain: ismain_str,
            employee: employee_str,
            date: date_str,
            by: by_str,
            product_id: product_id_str
        }

        if(arrayOrder.length > 0){
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

                    window.location.reload();

                    // ListOrderProduct();
                    // ListOrderProductDetail();
                    // ListCar();
                    // ListOrder();
                }
            });
        }else{
            $(document).Toasts('create', {
                title: "false",
                body: "กรุณาเลือกคนขับรถหรือออเดอร์",
                autohide: true,
                delay: 3000,
                fade: true,
                class: "bg-danger"
            });
        }
    }

    async function ListOrderProductDetail(){
        $.get('/api/listorderproductdetail',function(res,status){
            const { data } = res;
            listProductDetail = data;
            ref_product_id = data.map(item => item.product_id);
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

    function databaseToDate(data){
        const date = data.split('-');
        const year = Number(date[0]);
        const month = date[1]
        const day = date[2];
        return day+"/"+month+"/"+year;
    }

    function sendToNext(product_id){
        swal({
            title: "",
            text: "ยืนยันการส่งงาน",
            icon: "warning",
            buttons: {
                confirm: true,
                cancel: true,
            },
            infoMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {
                $.post('/api/manage/product/updatestatus',{
                    product_id: product_id,
                    by: "{{ Auth::user()->name }}"
                },(response,status) => {
                    const { success, message } = response;
                    if(success){
                        $(document).Toasts('create', {
                            title: status,
                            body: message,
                            autohide: true,
                            delay: 3000,
                            fade: true,
                            class: "bg-success"
                        });
                        window.location.reload();
                    }else{
                        $(document).Toasts('create', {
                            title: status,
                            body: message,
                            autohide: true,
                            delay: 3000,
                            fade: true,
                            class: "bg-danger"
                        });
                    }
                });
            }
        });
    }

</script>

@endsection