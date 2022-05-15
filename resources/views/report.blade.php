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
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                            <section class="mt-2 mb-2">
                                <div class="com-md-12 table-responsive">
                                    <table id="table-order" class="table dataTable">
                                        <thead>
                                            <th>รหัสออเดอร์</th>
                                            <th>วันที่รับออเดอร์</th>
                                            <th>วันที่จัดส่งสำเร็จ</th>
                                            <th>ชื่อผู้ส่ง</th>
                                            <th>ที่อยู่ผู้ส่ง</th>
                                            <th>ชื่อผู้รับ</th>
                                            <th>ที่อยู่ผู้รับ</th>
                                            <th>ประเภทของสินค้า</th>
                                            <th>ชื่อคนขับรถ</th>
                                            <th>ทะเบียนรถ</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="nav-expense" role="tabpanel" aria-labelledby="nav-expense-tab">กำลังปรับปรุง</div>
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
    $(document).ready(function(){
        getOrder();
    });

    async function getOrder(){
        const { data } = await $.get('/api/report/order/list');
        listOrder(data);
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
                {data: "start_date",className:"text-nowrap"},
                {data: "end_date",className:"text-nowrap"},
                {data: "sender_name",className:"text-nowrap"},
                {data: "sender_address"},
                {data: "reciever_name",className:"text-nowrap"},
                {data: "reciever_address"},
                {data: "product_desc"},
                {data: "driver_name",className:"text-nowrap"},
                {data: "regis_id"}
            ]
        });
    }
</script>

@endsection