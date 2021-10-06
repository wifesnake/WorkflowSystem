@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

        <div class="title-header">จัดการข้อมูลลูกค้า</div>

            <div class="btn-collapse">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse"
                    aria-expanded="false" aria-controls="collapse">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>เพิ่มข้อมูลลูกค้า
                </button>
            </div>
            <div class="collapse" id="collapse">

                <form action="#" id="f-customer">
                    <div class="group_data">

                        <div class="col-md-12">
                            <div class="title-form">
                                ข้อมูลลูกค้า
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                รหัสลูกค้า / ชื่อบริษัท <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-2">
                                <input type="text" disabled name="customer_id" id="customer_id" class="form-control" >
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="customer_name" id="customer_name" class="form-control"
                                    >
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ที่อยู่ <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <textarea name="address" id="address" class="form-control" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                หมายเลขโทรศัพท์ <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="phone" id="phone" class="form-control" >
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                เลขที่นิติบุคคล <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="customer_person_number" id="customer_person_number"
                                    class="form-control" >
                            </div>

                        </div>

                        <div class="menu-action col-md-12">
                            <input id="save-data" type="button" class="btn btn-primary" value="บันทึกข้อมูล"/>
                            <input id="cancel-data" type="button" class="btn btn-danger" value="ยกเลิก" />
                        </div>

                    </div>
                </form>
            </div>
            <div class="card mt-2">
                <section class="m-2">
                    <div class="com-md-12 table-responsive">
                        {!! $dataTable->table() !!}
                    </div>
                </section>
                {!! $dataTable->scripts() !!}
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection