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

            <div class="title-header">รายการจัดส่งสินค้าของฉัน</div>

            <div class="card mt-2">
                <section class="m-2">
                    <div class="col-md-12 table-responsive">
                        <div id="employee-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="employee-table_length"><label>Show <select
                                                name="employee-table_length" aria-controls="employee-table"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="employee-table_filter" class="dataTables_filter"><label>Search:<input
                                                type="search" class="form-control form-control-sm" placeholder=""
                                                aria-controls="employee-table"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table dataTable no-footer" id="employee-table" role="grid"
                                        aria-describedby="employee-table_info" style="width: 2174px;">
                                        <thead>
                                            <tr role="row">
                                                <th title="ชื่อ-สกุล" class="sorting sorting_asc" tabindex="0"
                                                    aria-controls="employee-table" rowspan="1" colspan="1"
                                                    style="width: 251px;" aria-sort="ascending"
                                                    aria-label="ชื่อ-สกุล: activate to sort column descending">
                                                    เลขที่เอกสาร
                                                </th>
                                                <th title="E-mail" class="sorting" tabindex="0"
                                                    aria-controls="employee-table" rowspan="1" colspan="1"
                                                    style="width: 405px;"
                                                    aria-label="E-mail: activate to sort column ascending">คนขับ</th>
                                                <th title="หมายเลขโทรศัพท์" class="sorting" tabindex="0"
                                                    aria-controls="employee-table" rowspan="1" colspan="1"
                                                    style="width: 263px;"
                                                    aria-label="หมายเลขโทรศัพท์: activate to sort column ascending">
                                                    หมายเลขโทรศัพท์</th>
                                                <th title="เงินเดือน" class="sorting" tabindex="0"
                                                    aria-controls="employee-table" rowspan="1" colspan="1"
                                                    style="width: 153px;"
                                                    aria-label="เงินเดือน: activate to sort column ascending">ทะเบียนรถ
                                                </th>
                                                <th title="ประเภทพนักงาน" class="sorting" tabindex="0"
                                                    aria-controls="employee-table" rowspan="1" colspan="1"
                                                    style="width: 248px;"
                                                    aria-label="ประเภทพนักงาน: activate to sort column ascending">
                                                    ประเภทรถ</th>
                                                <th title="หน่วยงาน" class="sorting" tabindex="0"
                                                    aria-controls="employee-table" rowspan="1" colspan="1"
                                                    style="width: 266px;"
                                                    aria-label="หน่วยงาน: activate to sort column ascending">
                                                    วันที่เข้ารับสินค้า
                                                </th>
                                                <th title="หน่วยงาน" class="sorting" tabindex="0"
                                                    aria-controls="employee-table" rowspan="1" colspan="1"
                                                    style="width: 266px;"
                                                    aria-label="หน่วยงาน: activate to sort column ascending">สถานะ
                                                </th>
                                                <th title="Action" class="sorting" tabindex="0"
                                                    aria-controls="employee-table" rowspan="1" colspan="1"
                                                    style="width: 293px;"
                                                    aria-label="Action: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd">
                                                <td class="sorting_1">PD22000001TH</td>
                                                <td>ยงยุทธ เลิศธิราวงศ์</td>
                                                <td>028643851</td>
                                                <td>1กก5265</td>
                                                <td>รถกระบะ</td>
                                                <td>04/03/2022</td>
                                                <td>Expenses</td>
                                                <td>
                                                    <div onclick="window.location.href='http://127.0.0.1:8000/updatestatusdetail'"
                                                        class="btn btn-sm btn-success btn-sm" data-toggle="modal"
                                                        data-target="#exampleModal">Update</div>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="sorting_1">PD22000002TH</td>
                                                <td>ยงยุทธ เลิศธิราวงศ์</td>
                                                <td>028643851</td>
                                                <td>1กก5265</td>
                                                <td>รถกระบะ</td>
                                                <td>04/03/2022</td>
                                                <td>Complete</td>
                                                <td>
                                                    <div onclick="window.location.href='http://127.0.0.1:8000/updatestatusdetail'"
                                                        class="btn btn-sm btn-success btn-sm" data-toggle="modal"
                                                        data-target="#exampleModal">Update</div>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="sorting_1">PD22000003TH</td>
                                                <td>ยงยุทธ เลิศธิราวงศ์</td>
                                                <td>028643851</td>
                                                <td>1กก5265</td>
                                                <td>รถกระบะ</td>
                                                <td>04/03/2022</td>
                                                <td>Complete</td>
                                                <td>
                                                    <div onclick="window.location.href='http://127.0.0.1:8000/updatestatusdetail'"
                                                        class="btn btn-sm btn-success btn-sm" data-toggle="modal"
                                                        data-target="#exampleModal">Update</div>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="sorting_1">PD22000004TH</td>
                                                <td>ยงยุทธ เลิศธิราวงศ์</td>
                                                <td>028643851</td>
                                                <td>1กก5265</td>
                                                <td>รถกระบะ</td>
                                                <td>04/03/2022</td>
                                                <td>Complete</td>
                                                <td>
                                                    <div  onclick="window.location.href='http://127.0.0.1:8000/updatestatusdetail'"
                                                        class="btn btn-sm btn-success btn-sm" data-toggle="modal"
                                                        data-target="#exampleModal">Update</div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div id="employee-table_processing" class="dataTables_processing card"
                                        style="display: none;">Processing...</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="employee-table_info" role="status"
                                        aria-live="polite">Showing 1 to 8 of 8 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="employee-table_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="employee-table_previous"><a href="#" aria-controls="employee-table"
                                                    data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                    aria-controls="employee-table" data-dt-idx="1" tabindex="0"
                                                    class="page-link">1</a></li>
                                            <li class="paginate_button page-item next disabled"
                                                id="employee-table_next"><a href="#" aria-controls="employee-table"
                                                    data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>



            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection