<style>
.btn-collapse {
    text-align: right;
}

</style>
@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="title-header">ระบุค่าใช้จ่ายในการจัดส่งสินค้า</div>

            <div class="card mt-2">
                <section class="m-2">
                    <div class="com-md-12 table-responsive">
                        <table id="table-product" class="table dataTable">
                            <thead>
                                <th>เลขที่เอกสาร</th>
                                <th>คนขับรถ</th>
                                <th>หมายเลขโทรศัพท์</th>
                                <th>ทะเบียนรถ</th>
                                <th>ประเภทรถ</th>
                                <th>วันที่เข้ารับสินค้า</th>
                                <th>สถานะ</th>
                                <th></th>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">รายละเอียดค่าใช้จ่ายในการขนส่ง</h5>
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
                                            <th>เลขที่ออเดอร์</th>
                                            <th>PO Number.</th>
                                            <th>Customer Name</th>
                                            <th>ผู้รับ</th>
                                            <th>น้ำหนัก</th>
                                            <th>วันที่รับออเดอร์</th>
                                            <th>สถานะออเดอร์</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="m-2">

                        <div class="row">
                            <div class="col-12">
                                <h5><u>เพิ่มข้อมูลค่าใช้จ่าย</u></h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="label-control" for="label-expense_type">ประเภทค่าใช้จ่าย<b class="request-data">**</b></label>
                                    <select select name="expense_type" id="expense_type" class="form-control">
                                        <option value="">-- Please Select --</option>
                                        <option value="001">รายรับ</option>
                                        <option value="002">รายจ่าย</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="label-control" for="label-amount">จำนวน <b class="request-data">**</b></label>
                                    <input type="number" name="amount" id="amount" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="label-control" for="label-remark">หมายเหตุ <b class="request-data">**</b></label>
                                    <textarea name="remark" id="remark" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="label-control" for="label-file">แนบไฟล์ <b class="request-data">**</b></label>
                                    <input type="file" name="file" placeholder="Choose file" id="file">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="button" style=" width: 100%; " onclick="add_expense()" class="btn btn-success">บันทึกข้อมูล</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <section class="m-2">
                        <div class="com-md-12 table-responsive">
                            <table id="table-expenses" class="table dataTable">
                                <thead>
                                    <th>ประเภทค่าใช้จ่าย</th>
                                    <th>จำนวนเงิน</th>
                                    <th>หมายเหตุ</th>
                                    <th>ไฟล์</th>
                                    <th>#</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <button id="save-data" type="button" class="btn btn-primary btn-sm"
                    onclick="sendProduct()">ส่งงาน</button>
                    <button id="close-data" type="button" class="btn btn-primary btn-sm"
                    onclick="CloseProduct()">ปิดงาน</button>
                <button id="cancel-data" type="button" class="btn btn-danger btn-sm"
                    data-dismiss="modal">ยกเลิก</button> 
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<style>
    .invalid-field {
        border-color: red !important
    }
</style>

<script>

    let global_product_id;
    let global_order_id;

    $(document).ready(function(){
        init();
        handle();
    });

    async function init(){
        await ListProduct();
    }

    async function handle(){
        $('#file').bind('change', function() {
            if(this.files[0].size > 1000000) {
                alert("อัพโหลดไฟล์ขนาดต่ำกว่า 1MB");
                $(this).val('');
            }
        });
    }

    async function ListProduct() {
        if ($.fn.dataTable.isDataTable('#table-product')) {
            $('#table-product').DataTable().destroy();
        }
        $('#table-product').dataTable({
            ajax:{
                url: "/api/expenses/listproduct",
                type: "get"
            },
            processing: true,
            destroy: true,
            columns:[
                {data: "product_id"},
                {data: "fullname",className:"text-nowrap"},
                {data: "to_phone"},
                {data: "regis_id"},
                {data: "vehicletype"},
                {data: "pickup_date"},
                // {data: "current_state"},
                {
                    data: null,
                    render:function(data,type,row){
                        const result = data.current_state == '09' ? data.current_state : data.on_status
                        return '<td>'+result+'</td>';
                    }
                },
                {
                    data: null,
                    render:function(data,type,row){
                        return '<td><div onClick="getOrder(\''+data.product_id +'\',\''+data.current_state+'\',\''+data.order_id+'\')" class="btn btn-sm btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">View</div></td>';
                    }
                }
            ]
        });
    }

    async function getOrder(product_id,status,order_id){
        global_product_id = product_id;
        global_order_id = order_id;

        if(status == "09"){
            $('#save-data').css('display','none');
            $('#close-data').css('display','block');
        }else{
            $('#save-data').css('display','block');
            $('#close-data').css('display','none');
        }

        if ($.fn.dataTable.isDataTable('#table-order')) {
            $('#table-order').DataTable().destroy();
        }
        $('#table-order').dataTable({
            ajax:{
                url: "/api/expenses/getorder/"+product_id,
                type: "get"
            },
            processing: true,
            destroy: true,
            "searching": false,
            "lengthChange": false,
            "pageLength": 50,
            "paging":   false,
            "info":     false,
            columns:[
                {data: "order_id"},
                {data: "po",className:"text-nowrap"},
                {data: "customer_name",className:"text-nowrap"},
                {data: "to_name",className:"text-nowrap"},
                {data: "weight"},
                {data: "pickup_date"},
                {
                    data: null,
                    render:function(data,type,row){
                        const str = data.ismainorder == 1 ? "หลัก" : "รอง";
                        return '<td>'+ str +'</td>';
                    }
                }
            ]
        });

        if ($.fn.dataTable.isDataTable('#table-expenses')) {
            $('#table-expenses').DataTable().destroy();
        }
        $('#table-expenses').dataTable({
            ajax:{
                url: "/api/expenses/getexpenses/"+product_id,
                type: "get"
            },
            processing: true,
            destroy: true,
            columns:[
                {
                    data: null,
                    render:function(data,type,row){
                        const str = data.expent_type == "001" ? "รายรับ" : "รายจ่าย";
                        return '<td>'+ str +'</td>';
                    }
                },
                {data: "amount"},
                {data: "remark"},
                {
                    data: null,
                    render:function(data,type,row){
                        const image = data.image_id ? '<image width="150px" src="'+data.base64+'">' : 'No Image';

                        return '<td>'+image+'</td>';
                    }
                },
                {
                    data:null,
                    render:function(data,type,row){
                        const image_id = data.image_id ? "'"+data.image_id+"'" : null;
                        return '<td><div onClick="deleteExpense(\''+data.id+'\','+ image_id +')" class="btn btn-sm btn-danger btn-sm">ลบ</div></td>';
                    }
                }
            ]
        });
    }

    async function add_expense() {
        let post = true;
        if($('#expense_type').val().trim()==""){
            $('#expense_type').addClass('invalid-field').focus();
            post = false;
        }else{
            $('#expense_type').removeClass('invalid-field');
            post = true;
        }
        if($('#amount').val().trim()==""){
            $('#amount').addClass('invalid-field').focus();
            post = false;
        }else{
            $('#amount').removeClass('invalid-field');
            post = true;
        }

        if(post){
            const jsonData = {
                product_id: global_product_id,
                expenese_type : $('#expense_type').val().trim(),
                amount : $('#amount').val().trim(),
                remark : $('#remark').val().trim(),
                by: "{{ Auth::user()->name }}"
            }

            if($('#file')[0].files.length > 0){
                var file_data = $('#file').prop('files')[0];
                var form_data = new FormData();                  
                form_data.append('file', file_data);
                form_data.append('product_id',global_product_id);
                form_data.append('username',"{{ Auth::user()->name }}");
                const type = "image_"+jsonData.expenese_type+"_"+jsonData.amount+"_"+jsonData.remark
                form_data.append('type_image',type);
                $.ajax({
                    url: "{{ route('upload.uploadFile') }}", // <-- point to server-side PHP script 
                    dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                         
                    type: 'post',
                    success: function(php_script_response){
                        // <-- display response from the PHP script, if any
                    }
                });
            }

            $.post('/api/expenses/addexpense',jsonData,(response,status)=>{
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
                    $('#expense_type').val('');
                    $('#amount').val('');
                    $('#remark').val('');
                    $('#file').val('');
                    getOrder(global_product_id);
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
    }

    async function deleteExpense(id,image_id){
        $.post('/api/expenses/deleteexpense',{
            id: id,
            image_id: image_id,
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
                getOrder(global_product_id);
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

    async function sendProduct(){
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
                $.post('/api/expenses/sendproduct',{
                    product_id: global_product_id,
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
                        $('#exampleModal').modal('hide');
                        // ListProduct();
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

    async function CloseProduct(){
        swal({
            title: "",
            text: "ยืนยันปิดงาน",
            icon: "warning",
            buttons: {
                confirm: true,
                cancel: true,
            },
            infoMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {
                $.post('/api/progress/close',{
                    product_id: global_product_id,
                    order_id: global_order_id,
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
                        $('#exampleModal').modal('hide');
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