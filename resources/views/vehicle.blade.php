@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="btn-collapse">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse"
                    aria-expanded="false" aria-controls="collapse">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>เพิ่มข้อมูลรถ
                </button>
            </div>
            <div class="collapse" id="collapse">

                <form action="#" id="f-vehicle">

                    <div class="menu-action col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    <div class="group_data">
                        <div class="col-md-12">
                            <div class="title-form">
                                ข้อมูลรถ
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                รหัสรถ :
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="car_id" id="car_id" class="form-control" required>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ทะเบียน :
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="regis_id" id="regis_id" class="form-control" required>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                รุ่นรถ :
                            </div>
                            <div class="col-md-9">
                                <textarea name="car_brand" id="car_brand" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ประเภทของรถ :
                            </div>
                            <div class="col-md-9">
                                <select name="isTrucktype" id="isTrucktype" class="form-control" required>
                                    <option value="">-- Please Select --</option>
                                </select>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ประเภทการใช้งาน :
                            </div>
                            <div class="col-md-9">
                                <select name="cartype" id="cartype" class="form-control" required>
                                    <option value="">-- Please Select --</option>
                                </select>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                สถานที่ใช้งานรถ (ตามข้อมูลลูกค้า) :
                            </div>
                            <div class="col-md-9">
                                <select name="car_plate" id="car_plate" class="form-control" required>
                                    <option value="">-- Please Select --</option>
                                </select>
                            </div>
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