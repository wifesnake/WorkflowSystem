@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="title-header">รายงาน</div>

            <div class="card">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-order-tab" data-bs-toggle="tab" data-bs-target="#nav-order" type="button" role="tab" aria-controls="nav-home" aria-selected="true">รายงานออเดอร์</button>
                            <button class="nav-link" id="nav-expense-tab" data-bs-toggle="tab" data-bs-target="#nav-expense" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">รายงานค่าใช้จ่าย</button>
                            <button class="nav-link" id="nav-agency-tab" data-bs-toggle="tab" data-bs-target="#nav-agency" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">รายงานหน่วยงาน</button>
                            <button class="nav-link" id="nav-agency2-tab" data-bs-toggle="tab" data-bs-target="#nav-agency2" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">รายงานหน่วยงานรายวัน</button>
                            <button class="nav-link" id="nav-expensesummary-tab" data-bs-toggle="tab" data-bs-target="#nav-expensesummary" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">สรุปรายงาน</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                            <section class="mt-2 mb-2">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                        <input class="form-control" type="month" name="order-date" id="order-date">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="btn btn-primary" onclick="getOrderByDate()">ค้นหา</div>
                                    </div>
                                </div>
                                <div class="com-md-12 table-responsive">
                                    <table id="table-order" class="table dataTable">
                                        <thead>
                                            <th>รหัสออเดอร์</th>
                                            <th>เลขที่ PO</th>
                                            <th>วันที่รับออเดอร์</th>
                                            <th>วันที่จัดส่งสำเร็จ</th>
                                            <th>วันที่ตรวจเอกสาร</th>
                                            <th>ชื่อผู้ส่ง</th>
                                            <th>ที่อยู่ผู้ส่ง</th>
                                            <th>ชื่อผู้รับ</th>
                                            <th>ที่อยู่ผู้รับ</th>
                                            <th>โทรศัพท์</th>
                                            <th>ประเภทของสินค้า</th>
                                            <th>จำนวนสินค้า(ชิ้น/กล่อง)</th>
                                            <th>น้ำหนัก(กิโลกรัม)</th>
                                            <th>ชื่อคนขับรถ</th>
                                            <th>ทะเบียนรถ</th>
                                            <th>ประเภทรถ</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="nav-expense" role="tabpanel" aria-labelledby="nav-expense-tab">
                            <section class="mt-2 mb-2">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                        <input class="form-control" type="month" name="expense-date" id="expense-date">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="btn btn-primary" onclick="getExspenseByDate()">ค้นหา</div>
                                    </div>
                                </div>
                                <div class="com-md-12 table-responsive">
                                    <table id="table-expense" class="table dataTable">
                                        <thead>
                                            <th>รหัสโปรดักส์</th>
                                            <th>รายรับ</th>
                                            <th>รายจ่าย</th>
                                            <th>พนักงานขับรถ</th>
                                            <th>วันที่รับออเดอร์</th>
                                            <th>วันที่จัดส่งสำเร็จ</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="nav-agency" role="tabpanel" aria-labelledby="nav-expense-tab">
                            <section class="mt-2 mb-2">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                        <input class="form-control" type="month" name="agency-date" id="agency-date">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="btn btn-primary" onclick="getAgencyByDate()">ค้นหา</div>
                                    </div>
                                </div>
                                <div class="com-md-12 table-responsive">
                                    <table id="table-agency" class="table dataTable">
                                        <thead>
                                            <th>ลำดับ</th>
                                            <th>วันที่(วันที่ขึ้นสินค้า)</th>
                                            <th>หน่วยงาน/คลังสินค้า</th>
                                            <th>ชื่อพนักงาน</th>
                                            <th>ทะเบียน</th>
                                            <th>ประเภทรถ</th>
                                            <th>เลขที่PO</th>
                                            <th>เลขออเดอร์</th>
                                            <th>ผู้รับสินค้า</th>
                                            <th>ที่อยู่</th>
                                            <th>จำนวน/ชิ้น</th>
                                            <th>วันที่ส่งสำเร็จ</th>
                                            <th>วันที่คืนบิล</th>
                                            <th>เลขโปรดักส์</th>
                                            <th>รายรับ</th>
                                            <th>น้ำมัน</th>
                                            <th>เบี้ยเลี้ยง</th>
                                            <th>ค่าพ่วง</th>
                                            <th>ทางด่วน</th>
                                            <th>อื่นๆ</th>
                                            <th>รายจ่าย</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </section>
                        </div>

                        
                        <div class="tab-pane fade" id="nav-agency2" role="tabpanel" aria-labelledby="nav-expense-tab">
                            <section class="mt-2 mb-2">
                                <div class="row">
                                    
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                        <input class="form-control" type="date" name="agency2-date" id="agency2-date">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">

                                        <select name="cust_name" id="cust_name" class="form-control">
                                            <option value="">-- Please Select --</option>
                                            @foreach ($tb_customer as $item)
                                            <option value="{{$item->customer_id}}">{{$item->customer_name}}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="btn btn-primary" onclick="getAgency2ByDate()">ค้นหา</div>
                                    </div>
                                </div>
                                <div class="com-md-12 table-responsive">
                                    <table id="table-agency2" class="table dataTable">
                                        <thead>
                                            <th>ลำดับ</th>
                                            <th>วันที่(วันที่ขึ้นสินค้า)</th>
                                            <th>หน่วยงาน/คลังสินค้า</th>
                                            <th>ชื่อพนักงาน</th>
                                            <th>ทะเบียน</th>
                                            <th>ประเภทรถ</th>
                                            <th>เลขที่PO</th>
                                            <th>เลขออเดอร์</th>
                                            <th>ผู้รับสินค้า</th>
                                            <th>เลขโปรดักส์</th>
                                            <th>น้ำมัน</th>
                                            <th>เบี้ยเลี้ยง</th>
                                            <th>ค่าพ่วง</th>
                                            <th>ทางด่วน</th>
                                            <th>อื่นๆ</th>
                                            <th>รายจ่าย</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </section>
                        </div>

                        <div class="tab-pane fade" id="nav-expensesummary" role="tabpanel" aria-labelledby="nav-expensesummary-tab">
                            <section class="mt-2 mb-2">
                                <div id="render-table-expensesumary"></div>
                            </section>
                        </div>

                    </div>                      
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
        color: #ffffff;
        background-color: #008000;
    }

    .nav-tabs .nav-link, .nav-tabs .nav-item.show .nav-link {
        color: #ffffff;
        background-color: #156140;
    }

</style>

<script>

    $( "#nav-expensesummary-tab" ).click(function() {
        getExspenseSummary();
    });

    $(document).ready(function(){
        //getOrder();
        //getExspense();
        //getAgency();
        //getExspenseSummary();
    });

    async function getOrder(){
        const { data } = await $.post('/api/report/order/list',{date: ""});
        listOrder(data);
    }

    async function getExspense(){
        const { data } = await $.post('/api/report/order/expense',{date: ""});
        ListExspense(data);
    }

    async function getExspenseSummary(){
        const { data } = await $.post('/api/report/order/expensesummary',{date: ""});
        ListExspenseSummary(data);
    }

    async function getAgency(){
        const { data } = await $.post('/api/report/order/agency',{date: ""});
        ListAgency(data);
    }

    async function getOrderByDate(){
        const date = $('[name=order-date]').val();
        const { data } = await $.post('/api/report/order/list',{date: date});
        listOrder(data);
    }

    async function getExspenseByDate(){
        const date = $('[name=expense-date]').val();
        const { data } = await $.post('/api/report/order/expense',{date: date});
        ListExspense(data);
    }

    async function getAgencyByDate(){
        const date = $('[name=agency-date]').val();
        const { data } = await $.post('/api/report/order/agency',{date: date});
        console.log(data);
        ListAgency(data);
    }

    async function getAgency2ByDate(){
        const date = $('[name=agency2-date]').val();
        const cust_id = $('#cust_name option:selected').val();
        const { data } = await $.post('/api/report/order/agency2',{date: date,cust_id:cust_id});
        console.log(data);
        ListAgency2(data);
    }

    function listOrder(data){
        if ($.fn.dataTable.isDataTable('#table-order')) {
            $('#table-order').DataTable().destroy();
        }
        $('#table-order').dataTable({
            data: data,
            processing: true,
            destroy: true,
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ],
            columns:[
                {data: "order_id",className:"text-nowrap"},
                {data: "po",className:"text-nowrap"},
                {data: "start_date",className:"text-nowrap"},
                {data: "end_date",className:"text-nowrap"},
                {data: "check_doc",className:"text-nowrap"},
                {data: "sender_name",className:"text-nowrap"},
                {data: "sender_address"},
                {data: "reciever_name",className:"text-nowrap"},
                {data: "reciever_address"},
                {data: "reciever_phone"},
                {data: "product_desc"},
                {data: "product_number"},
                {data: "weight"},
                {data: "driver_name",className:"text-nowrap"},
                {data: "regis_id"},
                {data: "isTrucktype"}
            ]
        });
    }

    function ListExspense(data){
        if ($.fn.dataTable.isDataTable('#table-expense')) {
            $('#table-expense').DataTable().destroy();
        }
        $('#table-expense').dataTable({
            data: data,
            processing: true,
            destroy: true,
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ],
            columns:[
                {data: "product_id",className:"text-nowrap"},
                // {data: "receive_amount",className:"text-nowrap"},
                // {data: "pay_amount",className:"text-nowrap"},
                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.receive_amount));
                    }
                },
                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.pay_amount));
                    }
                },
                {data: "driver_name",className:"text-nowrap"},
                {data: "start_date",className:"text-nowrap"},
                {data: "end_date",className:"text-nowrap"}
            ]
        });
    }

    function ListAgency(data){
        if ($.fn.dataTable.isDataTable('#table-agency')) {
            $('#table-agency').DataTable().destroy();
        }
        var datatable = $('#table-agency').dataTable({
            data: data,
            processing: true,
            destroy: true,
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ],
            columns:[
                {data: "row_num",className:"text-nowrap"},
                {data: "pickup_date",className:"text-nowrap"},
                {data: "customer_name",className:"text-nowrap"},
                {data: "driver",className:"text-nowrap"},
                {data: "car_sign",className:"text-nowrap"},
                {data: "car_type",className:"text-nowrap"},
                {data: "po",className:"text-nowrap"},
                {data: "order_id",className:"text-nowrap"},
                {data: "to_name",className:"text-nowrap"},
                {data: "to_address",className:"text-nowrap"},
                {data: "product_number",className:"text-nowrap"},
                {data: "date_received",className:"text-nowrap"},
                {data: "clear_bill",className:"text-nowrap"},
                {data: "product_id",className:"text-nowrap"},
                // {data: "income",className:"text-nowrap"},
                // {data: "payment",className:"text-nowrap"},
                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.income));
                    }
                },
                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.oil));
                    }
                },
                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.food));
                    }
                },
                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.trailer));
                    }
                },
                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.toll));
                    }
                },
                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.extra));
                    }
                },
                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.payment));
                    }
                },
                // {data: "driver_name",className:"text-nowrap"},
                // {data: "start_date",className:"text-nowrap"},
                // {data: "end_date",className:"text-nowrap"}
            ]
            // "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            //     $('td:eq(0)', nRow).html(iDisplayIndexFull +1);
            // }
        });
    }

    function ListAgency2(data){
        if ($.fn.dataTable.isDataTable('#table-agency2')) {
            $('#table-agency2').DataTable().destroy();
        }
        var datatable = $('#table-agency2').dataTable({
            data: data,
            processing: true,
            destroy: true,
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ],
            columns:[
                {data: "row_num",className:"text-nowrap"},
                {data: "pickup_date",className:"text-nowrap"},
                {data: "customer_name",className:"text-nowrap"},
                {data: "driver",className:"text-nowrap"},
                {data: "car_sign",className:"text-nowrap"},
                {data: "car_type",className:"text-nowrap"},
                {data: "po",className:"text-nowrap"},
                {data: "order_id",className:"text-nowrap"},
                {data: "to_name",className:"text-nowrap"},
                {data: "product_id",className:"text-nowrap"},
                // {data: "income",className:"text-nowrap"},
                // {data: "payment",className:"text-nowrap"},

                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.oil));
                    }
                },
                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.food));
                    }
                },
                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.trailer));
                    }
                },
                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.toll));
                    }
                },
                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.extra));
                    }
                },
                {
                    data: null,
                    render: function(data,type,row){
                        return currencyFormat(Number(data.payment));
                    }
                },
                // {data: "driver_name",className:"text-nowrap"},
                // {data: "start_date",className:"text-nowrap"},
                // {data: "end_date",className:"text-nowrap"}
            ]
            // "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            //     $('td:eq(0)', nRow).html(iDisplayIndexFull +1);
            // }
        });
    }

    function ListExspenseSummary(data) {
        let array_data = [];
        data.forEach(item =>{
            let array_temp = [item.employees,item.sign_car,item.po,item.to_name,item.oil,item.food,item.trailer,item.toll,item.extra,item.amount]
            array_data.push(array_temp)
        });
    
        let render_string = `<table id="table-expensesumary" class="table dataTable">`;
            render_string += `</table>`;
            
        $('#render-table-expensesumary').html(render_string)
        if ($.fn.dataTable.isDataTable('#table-expensesumary')) {
            $('#table-expensesumary').DataTable().destroy();
        }
        var datatable = $('#table-expensesumary').dataTable({
            data: array_data,
            columns: [
                {
                    title: "ชื่อพนักงาน"
                },
                {
                    title: "ทะเบียน"
                },
                {
                    title: "หมายเลข PO"
                },
                {
                    title: "รายการ"
                },
                {
                    title: "น้ำมัน"
                },
                {
                    title: "เบี้ยเลี้ยง"
                },
                {
                    title: "ค่าพ่วง"
                },
                {
                    title: "ทางด่วน"
                },
                {
                    title: "อื่นๆ"
                },
                {
                    title: "รวม"
                }
            ],
            rowsGroup: [
                0,1,2,3
            ]
        })
    }

    function currencyFormat(data){
        return (data).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }
</script>

@endsection