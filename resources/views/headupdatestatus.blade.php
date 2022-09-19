
@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card mt-2">
                <section class="m-2">
                    <div class="com-md-12 table-responsive">
                        <table id="table-expense" class="table dataTable">
                            <thead>
                                <th>เลขที่เอกสาร</th>
                                <th>ผู้ส่ง</th>
                                <th>คนขับ</th>
                                <th>หมายเลขโทรศัพท์</th>
                                <th>ทะเบียนรถ</th>
                                <th>ประเภทรถ</th>
                                <th>วันที่เข้ารับสินค้า</th>
                                {{-- <th>สถานะ</th> --}}
                                <th>#</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </section>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการจัดส่งสินค้า</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">

                                    <div class="card mt-2">
                                        <section class="m-2">
                                            <div class="com-md-12 table-responsive">
                                                <table id="table-order" class="table dataTable">
                                                    <thead>
                                                        <th>(เลขที่ออเดอร์)</th>
                                                        <th>คนขับรถ</th>
                                                        <th>ทะเบียน</th>
                                                        <th>PO Number.</th>
                                                        <th>Customer Name</th>
                                                        <th>ผู้รับ</th>
                                                        <th>สถานะออเดอร์</th>
                                                        <th>สถานะ</th>
                                                        <th>#</th>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>
<script>
    $(document).ready(() => {
        init();
    });

    function init() {
        getListExpense();
    }

    async function getListExpense(){
        if ($.fn.dataTable.isDataTable('#table-expense')) {
            $('#table-expense').DataTable().destroy();
        }
        $('#table-expense').dataTable({
            ajax:{
                url: "/api/progress/listheadproduct",
                type: "get"
            },
            processing: true,
            destroy: true,
            columns:[
                {data: "product_id"},
                {data: "customer_name"},
                {data: "fullname",className:"text-nowrap"},
                {data: "to_phone"},
                {data: "regis_id"},
                {data: "cartype"},
                {data: "pickup_date"},
                // {data: "current_state"},
                {
                    data: null,
                    render:function(data,type,row){
                        return '<td><div onClick="detail(\''+data.product_id +'\')" class="btn btn-sm btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">View</div></td>';
                    }
                }
            ]
        });
    }

    async function detail(product_id) {
        if ($.fn.dataTable.isDataTable('#table-order')) {
            $('#table-order').DataTable().destroy();
        }
        $('#table-order').dataTable({
            ajax:{
                url: "/api/progress/listheadorder/"+product_id,
                type: "get"
            },
            processing: true,
            destroy: true,
            columns:[
                {data: "order_id"},
                {data: "fullname",className:"text-nowrap"},
                {data: "regis_id"},
                {data: "po"},
                {data: "customer_name",className:"text-nowrap"},
                {data: "to_name",className:"text-nowrap"},
                {
                    data: null,
                    render:function(data,type,row){
                        const result = data.ismainorder == 1 ? "หลัก" : "รอง";
                        return '<td>'+ result +'</td>';
                    }
                },
                // {data: "current_state"},
                {
                    data: null,
                    render:function(data,type,row){
                    var StatusName = "";

                    if (data.current_state == "07") {
                        StatusName = " จัดส่งพัสดุสำเร็จ";
                    } else if (data.current_state == "08") {
                        StatusName = "พนักงานนำส่งเอกสาร";
                    } else if (data.current_state == "09") {
                        StatusName = "ตรวจเอกสารแล้ว";
                    } else {
                        StatusName = "";
                    }
                    return StatusName;
                    }
                },
                {
                    data: null,
                    render:function(data,type,row){
                        const result = data.current_state == "08" ? "<div class='btn btn-secondary' onClick='updateStatus(\""+ data.order_id +"\",\""+ product_id +"\")'>รับเอกสาร</div>" : ""
                        return '<td>' + result + '</td>';
                    }
                }
            ]
        });
    }

    async function updateStatus(order_id,product_id){
        swal({
            title: "",
            text: "ยืนยันรับเอกสาร",
            icon: "warning",
            buttons: {
                confirm: true,
                cancel: true,
            },
            infoMode: true,
        }).then(function(isConfirm) {
            if(isConfirm){
                $.post('/api/progress/head/update',{
                    product_id: product_id,
                    order_id: order_id,
                    by: "{{ Auth::user()->name }}"
                },(response,status)=>{
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