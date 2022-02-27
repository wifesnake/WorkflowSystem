@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="title-header">จัดการรถ</div>
            {{-- <div class="group_data"> --}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <h4>ออเดอร์</h4>
                            <select class="form-control" name="listOrder"></select>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>คนขับ</h4>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">รถขนาดใหญ่</label>
                        <div class="row">
                            <div class="col">
                                <div class="input-group margin">
                                    <select type="text" class="form-control"></select>
                                    <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-flat">เพิ่ม</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="list-driver-L"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="">รถขนาดเล็ก</label>
                        <div class="row">
                            <div class="col">
                                <div class="input-group margin">
                                    <select type="text" class="form-control"></select>
                                    <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-flat">เพิ่ม</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="list-driver-m"></div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {
        init();
        handle()
    });

    async function init() {
        await getListOrder();
        await getListDriver();
    }

    async function handle() {
        $('[name="listOrder"]').on('change',async function () {
            const selected = $(this);
            const order_id = selected.val();
            await $.post('/api/getDataListOrder',{order_id : order_id},function (res) {
                const { data } = res;
                if(data){
                    let LCar = 0;
                    let mCar = 0;
                    data.forEach(item => {
                        mCar = item.m_unit;
                        LCar = item.L_unit;
                    });
                    let html;
                    for(let i=1;i<=LCar;i++){
                        html += '<div class="row"><div class="col-md-12"><label class="Lcar-'+i+'">'+i+'. -</label></div></div>';
                    }
                    html = html.replace(/undefined/g,'');
                    $('.list-driver-L').html(html);

                    html = "";
                    for(let i=1;i<=mCar;i++){
                        html += '<div class="row"><div class="col-md-12"><label class="mcar-'+i+'">'+i+'. -</label></div></div>';
                    }
                    html = html.replace(/undefined/g,'');
                    $('.list-driver-m').html(html);
                }
            });
        });
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

    async function getListDriver(){
        // await $.get('/api/listorder',function (res) {
            
            
        // });
    }
</script>

@endsection