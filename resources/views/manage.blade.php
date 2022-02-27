@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="" class="label-control"><u>ข้อมูลออเดอร์</u></label>
                        <select class="form-control" name="listOrder"></select>
                    </div>
                </div>
                <div class="col-md-3 col-lg-4"></div>
                <div class="col-md-3 col-lg-4"></div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>รหัสออเดอร์:</label>&nbsp;<label class="label-order_id">-</label>
                </div>
                <div class="col-md-4">
                    <label>รหัสPO:</label>&nbsp;<label class="label-po">-</label>
                </div>
                <div class="col-md-4">
                    <label>เลขนิติบุคคล:</label>&nbsp;<label class="label-customer_person_number">-</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>ชื่อลูกค้า:</label>&nbsp;<label class="label-customer_name">-</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>หมายเหตุจากลูกค้า:</label>&nbsp;<label class="label-order_remark">-</label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <label><u>ข้อมูลผู้รับสินค้า</u></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>ชื่อ-นามสกุล:</label>&nbsp;
                    <label class="label-to_name">-</label>
                </div>
                <div class="col-md-4">
                    <label>โทรศัพท์:</label>&nbsp;
                    <label class="label-to_phone">-</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>ที่อยู่:</label>&nbsp;
                    <label class="label-to_address">-</label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <label><u>รายละเอียดสินค้า</u></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>รายละเอียดสินค้า:</label>&nbsp;
                    <label class="label-product_desc">-</label>
                </div>
                <div class="col-md-4">
                    <label>ชนิดสินค้า:</label>&nbsp;
                    <label class="label-product_name">-</label>
                </div>
                <div class="col-md-4">
                    <label>น้ำหนัก (kg):</label>&nbsp;
                    <label class="label-weight">-</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>ประรถที่ต้องการ:</label>&nbsp;
                    <label class="label-car_name">-</label>
                </div>
                <div class="col-md-4">
                    <label>จำนวนรถเล็ก:</label>&nbsp;
                    <label class="label-m_unit">-</label>
                </div>
                <div class="col-md-4">
                    <label>จำนวนรถใหญ่:</label>&nbsp;
                    <label class="label-L_unit">-</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>เพิ่มเติม:</label>&nbsp;
                    <label class="label-remark">-</label>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<script>
    $(document).ready(function(){
        //init
        init();

        //Handle
        $('[name="listOrder"]').on('change',async function () {
            const selected = $(this);
            const order_id = selected.val();
            await $.post('/api/getDataListOrder',{order_id : order_id},function (res) {
                const { data } = res;
                if(data){
                    data.forEach(item => {
                        $('.label-order_id').html(item.order_id);
                        $('.label-po').html(item.po);
                        $('.label-customer_name').html(item.cust_code+" - "+item.customer_name);
                        $('.label-customer_person_number').html(item.customer_person_number);
                        $('.label-order_remark').html(item.order_remark);
                        $('.label-product_desc').html(item.product_desc);
                        $('.label-to_name').html(item.to_name);
                        $('.label-to_phone').html(item.to_phone);
                        $('.label-to_address').html(item.to_address);
                        $('.label-product_name').html(item.product_name);
                        $('.label-weight').html(item.weight);
                        $('.label-car_name').html(item.car_name);
                        $('.label-m_unit').html(item.m_unit);
                        $('.label-L_unit').html(item.L_unit);
                        $('.label-remark').html(item.remark);
                        $('.label-address').html(item.address);
                    });
                }
            });
        });
    });

    async function init() {
        await getListOrder();
    }

    async function getListOrder(params) {
        await $.get('/api/listorder',function (res) {
            const { data } = res;
            if(data){
                const option = $("<option selected>").val('').text('กรุณาเลือกออเดอร์');
                $('[name="listOrder"]').append(option);
                data.forEach(item => {
                    // $('[name=listOrder]').append('<option>a</option>')
                    const opt = $("<option>").val(item.order_id).text(item.order_id+" - "+item.to_name);
                    $('[name="listOrder"]').append(opt);
                });
            }
        });
    }
</script>

@endsection