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

            <div class="title-header">จัดการออเดอร์คนขับรถ</div>

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
                                                    aria-label="ชื่อ-สกุล: activate to sort column descending">ชื่อ-สกุล
                                                </th>
                                                <th title="E-mail" class="sorting" tabindex="0"
                                                    aria-controls="employee-table" rowspan="1" colspan="1"
                                                    style="width: 405px;"
                                                    aria-label="E-mail: activate to sort column ascending">ทะเบียนรถ</th>
                                                <th title="หมายเลขโทรศัพท์" class="sorting" tabindex="0"
                                                    aria-controls="employee-table" rowspan="1" colspan="1"
                                                    style="width: 263px;"
                                                    aria-label="หมายเลขโทรศัพท์: activate to sort column ascending">
                                                    หมายเลขโทรศัพท์</th>
                                                <th title="เงินเดือน" class="sorting" tabindex="0"
                                                    aria-controls="employee-table" rowspan="1" colspan="1"
                                                    style="width: 153px;"
                                                    aria-label="เงินเดือน: activate to sort column ascending">รุ่นรถ
                                                </th>
                                                <th title="ประเภทพนักงาน" class="sorting" tabindex="0"
                                                    aria-controls="employee-table" rowspan="1" colspan="1"
                                                    style="width: 248px;"
                                                    aria-label="ประเภทพนักงาน: activate to sort column ascending">
                                                    ประเภทรถ</th>
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
                                                <td class="sorting_1">ประมงค์ บุญเขื่อง</td>
                                                <td>4กฬ8996</td>
                                                <td>028643851</td>
                                                <td>รถกระบะ</td>
                                                <td>รถบริษัท</td>
                                                <td>อยู่ระหว่างขนส่ง</td>
                                                <td>
                                                    <div onclick="onEdit(25,'view');"
                                                        class="btn btn-sm btn-success btn-sm" data-toggle="modal"
                                                        data-target="#exampleModal">View</div>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td class="sorting_1">มนูญ ศรีบุญเรือง</td>
                                                <td>4กฬ8996</td>
                                                <td>028643851</td>
                                                <td>รถกระบะ</td>
                                                <td>รถบริษัท</td>
                                                <td>อยู่ระหว่างขนส่ง</td>
                                                <td>
                                                    <div onclick="onEdit(26,'view');"
                                                        class="btn btn-sm btn-success btn-sm" data-toggle="modal"
                                                        data-target="#exampleModal">View</div>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="sorting_1">ยงยุทธ เลิศธิราวงศ์</td>
                                                <td>4กฬ8996</td>
                                                <td>0899515369</td>
                                                <td>รถบรรทุก</td>
                                                <td>รถบริษัท</td>
                                                <td>ว่าง</td>
                                                <td>
                                                    <div onclick="onEdit(1,'view');"
                                                        class="btn btn-sm btn-success btn-sm" data-toggle="modal"
                                                        data-target="#exampleModal">View</div>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td class="sorting_1">ณัฐพงษ์ สุริยะวศ์</td>
                                                <td>4กฬ8996</td>
                                                <td>0987654321</td>
                                                <td>รถบรรทุก</td>
                                                <td>รถบริษัท</td>
                                                <td>ว่าง</td>
                                                <td>
                                                    <div onclick="onEdit(10,'view');"
                                                        class="btn btn-sm btn-success btn-sm" data-toggle="modal"
                                                        data-target="#exampleModal">View</div>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="m-f-employee">
                    {{-- <div class="group_data"> --}}
                    <input type="hidden" name="m-id" id="m-id" value="">
                    <div class="row col-md-12">
                            นาย ยงยุทธ เลิศธิราวงศ์ พนักงานประจำ
                    </div>

                    <div class="row col-md-12">
                            ทะเบียนรถ 1กก999 รุ่นรถ Hirux Revo
                    </div>

                    <div class="row col-md-12">
                        ประเภทรถ รถกระบะ  สถานะ รถบริษัท
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            วันที่เข้ารับสินค้า <b class="request-data">**</b> :
                        </div>
                        <div class="col-md-9">
                            <input type="number" name="m-id_card" id="m-id_card" class="form-control">
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            หมายเหตุ <b class="request-data">**</b> :
                        </div>
                        <div class="col-md-9">
                            <input type="number" name="m-id_card" id="m-id_card" class="form-control">
                        </div>
                    </div>

                    <div class="row col-md-12">
                    <div class="card mt-2">
                <section class="m-2">
                    <div class="com-md-12 table-responsive">
                        <div id="table_id_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="table_id_length"><label>Show <select
                                                name="table_id_length" aria-controls="table_id"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="table_id_filter" class="dataTables_filter"><label>Search:<input
                                                type="search" class="form-control form-control-sm" placeholder=""
                                                aria-controls="table_id"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="table_id" class="table dataTable no-footer" role="grid"
                                        aria-describedby="table_id_info" style="width: 2202px;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Tracking No.: activate to sort column ascending"
                                                    style="width: 197px;">Tracking No.</th>
                                                <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1"
                                                    colspan="1"
                                                    aria-label="PO Number.: activate to sort column ascending"
                                                    style="width: 192px;">PO Number.</th>
                                                <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Customer Name: activate to sort column ascending"
                                                    style="width: 448px;">Customer Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1"
                                                    colspan="1" aria-label="ผู้รับ: activate to sort column ascending"
                                                    style="width: 331px;">ผู้รับ</th>
                                                <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1"
                                                    colspan="1" aria-label="น้ำหนัก: activate to sort column ascending"
                                                    style="width: 124px;">น้ำหนัก</th>
                                                <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1"
                                                    colspan="1" aria-label="สถานะ: activate to sort column ascending"
                                                    style="width: 231px;">สถานะ</th>
                                                <th class="sorting sorting_desc" tabindex="0" aria-controls="table_id"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Create: activate to sort column ascending"
                                                    style="width: 223px;" aria-sort="descending">Create</th>
                                                <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1"
                                                    colspan="1" aria-label=": activate to sort column ascending"
                                                    style="width: 120px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd">
                                                <td>VC21000017TH</td>
                                                <td>211200001</td>
                                                <td>บริษัท มรกต อินดัสตรี้ส์ จำกัด (มหาชน)</td>
                                                <td>ซีพี มหาชีย</td>
                                                <td>3000</td>
                                                <td>Officer Insert Data</td>
                                                <td class="sorting_1">2021-12-21 13:19:13</td>
                                                <td>
                                                    <div class="btn btn-primary"
                                                        onclick="ViewData(&quot;VC21000017TH&quot;);">View</div>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td>VC21000016TH</td>
                                                <td>17120001</td>
                                                <td>บริษัท เจนเนอรัล เบฟเวอร์เรจ จำกัด</td>
                                                <td>เจนเนอรัลเบฟ สาขาอ้อมน้อย</td>
                                                <td>11000</td>
                                                <td>Officer Insert Data</td>
                                                <td class="sorting_1">2021-12-17 10:49:06</td>
                                                <td>
                                                    <div class="btn btn-primary"
                                                        onclick="ViewData(&quot;VC21000016TH&quot;);">View</div>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td>VC21000010TH</td>
                                                <td>1152452399</td>
                                                <td>บริษัท มรกต อินดัสตรี้ส์ จำกัด (มหาชน)</td>
                                                <td>Nicha Hair</td>
                                                <td>2000</td>
                                                <td>Officer Insert Data</td>
                                                <td class="sorting_1">2021-10-10 12:08:19</td>
                                                <td>
                                                    <div class="btn btn-primary"
                                                        onclick="ViewData(&quot;VC21000010TH&quot;);">View</div>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td>VC21000009TH</td>
                                                <td>11524523658</td>
                                                <td>บริษัท มรกต อินดัสตรี้ส์ จำกัด (มหาชน)</td>
                                                <td>Nicha Hair</td>
                                                <td>15</td>
                                                <td>Officer Insert Data</td>
                                                <td class="sorting_1">2021-10-10 11:20:38</td>
                                                <td>
                                                    <div class="btn btn-primary"
                                                        onclick="ViewData(&quot;VC21000009TH&quot;);">View</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div id="table_id_processing" class="dataTables_processing card"
                                        style="display: none;">Processing...</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="table_id_info" role="status" aria-live="polite">
                                        Showing 1 to 4 of 4 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="table_id_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="table_id_previous"><a href="#" aria-controls="table_id"
                                                    data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                    aria-controls="table_id" data-dt-idx="1" tabindex="0"
                                                    class="page-link">1</a></li>
                                            <li class="paginate_button page-item next disabled" id="table_id_next"><a
                                                    href="#" aria-controls="table_id" data-dt-idx="2" tabindex="0"
                                                    class="page-link">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
                    </div>


                    {{-- </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button id="save-data" type="button" class="btn btn-primary btn-sm"
                    onclick="BtnEdit(); false">บันทึกข้อมูล</button>
                <button id="save-data" type="button" class="btn btn-primary btn-sm"
                    onclick="BtnEdit(); false">ส่งงาน</button>
                <button id="cancel-data" type="button" class="btn btn-danger btn-sm"
                    data-dismiss="modal">ยกเลิก</button>
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

@endsection