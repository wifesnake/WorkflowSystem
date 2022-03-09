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

            <div class="title-header">รายละเอียดการจัดส่งสินค้า</div>



            
                            <table id="table-product" class="table dataTable no-footer dtr-inline"
                                aria-describedby="table-product_info" style="width: 2250px;">
                                <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="table-product"
                                            rowspan="1" colspan="1" style="width: 327px;" aria-sort="ascending"
                                            aria-label="เลขที่เอกสาร: activate to sort column descending">ประเภทค่าใช้จ่าย
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="table-product" rowspan="1"
                                            colspan="1" style="width: 259px;"
                                            aria-label="ประเภทรถ: activate to sort column ascending">จำนวนเงิน</th>
                                        <th class="sorting" tabindex="0" aria-controls="table-product" rowspan="1"
                                            colspan="1" style="width: 260px;"
                                            aria-label="ทะเบียนรถ: activate to sort column ascending">หมายเหตุ</th>
                                        <th class="sorting" tabindex="0" aria-controls="table-product" rowspan="1"
                                            colspan="1" style="width: 360px;"
                                            aria-label="คนขับ: activate to sort column ascending">ไฟล์</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">รายรับ</td>
                                        <td>1700</td>
                                        <td>ค่าน้ำมัน</td>
                                        <td>Link</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">รายจ่าย</td>
                                        <td>500</td>
                                        <td>เบิกค่าน้ำมัน</td>
                                        <td>Link</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">รายรับ</td>
                                        <td>120</td>
                                        <td>ค่าลงของพาเหรด</td>
                                        <td>Link</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="table-product_processing" class="dataTables_processing card"
                                style="display: none;">Processing...</div>


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
                                                            type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="table_id"></label></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="table_id" class="table dataTable no-footer" role="grid"
                                                    aria-describedby="table_id_info" style="width: 2202px;">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="table_id"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Tracking No.: activate to sort column ascending"
                                                                style="width: 197px;">(เลขที่ออเดอร์)</th>
                                                            <th class="sorting" tabindex="0" aria-controls="table_id"
                                                                rowspan="1" colspan="1"
                                                                aria-label="PO Number.: activate to sort column ascending"
                                                                style="width: 192px;">PO Number.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="table_id"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Customer Name: activate to sort column ascending"
                                                                style="width: 448px;">Customer Name</th>
                                                            <th class="sorting" tabindex="0" aria-controls="table_id"
                                                                rowspan="1" colspan="1"
                                                                aria-label="ผู้รับ: activate to sort column ascending"
                                                                style="width: 331px;">ผู้รับ</th>

                                                            <th class="sorting sorting_desc" tabindex="0"
                                                                aria-controls="table_id" rowspan="1" colspan="1"
                                                                aria-label="Create: activate to sort column ascending"
                                                                style="width: 223px;" aria-sort="descending">
                                                                สถานะออเดอร์</th>
                                                            <th class="sorting" tabindex="0" aria-controls="table_id"
                                                                rowspan="1" colspan="1"
                                                                aria-label="น้ำหนัก: activate to sort column ascending"
                                                                style="width: 124px;">สถานะ</th>
                                                            <th class="sorting" tabindex="0" aria-controls="table_id"
                                                                rowspan="1" colspan="1"
                                                                aria-label="น้ำหนัก: activate to sort column ascending"
                                                                style="width: 124px;"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="odd">
                                                            <td>VC21000017TH</td>
                                                            <td>211200001</td>
                                                            <td>บริษัท มรกต อินดัสตรี้ส์ จำกัด (มหาชน)</td>
                                                            <td>ซีพี มหาชีย</td>
                                                            <td class="sorting_1">หลัก</td>
                                                            <td>พนักงานเข้ารับสินค้าที่คลังสินค้าแล้ว</td>
                                                            <td>
                                                                <div onclick="onEdit(26,'view');"
                                                                    class="btn btn-sm btn-info btn-sm" data-toggle="modal"
                                                                    data-target="#exampleModal">Update</div>
                                                            </td>
                                                        </tr>
                                                        <tr class="even">
                                                            <td>VC21000016TH</td>
                                                            <td>17120001</td>
                                                            <td>บริษัท เจนเนอรัล เบฟเวอร์เรจ จำกัด</td>
                                                            <td>เจนเนอรัลเบฟ สาขาอ้อมน้อย</td>
                                                            <td class="sorting_1">หลัก</td>
                                                            <td>พนักงานจัดการรถที่ใช้สำหรับส่งสินค้าแล้ว</td>
                                                            <td>
                                                                <div onclick="onEdit(26,'view');"
                                                                    class="btn btn-sm btn-info btn-sm" data-toggle="modal"
                                                                    data-target="#exampleModal">Update</div>
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
                                                <div class="dataTables_info" id="table_id_info" role="status"
                                                    aria-live="polite">
                                                    Showing 1 to 4 of 4 entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                    id="table_id_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled"
                                                            id="table_id_previous"><a href="#" aria-controls="table_id"
                                                                data-dt-idx="0" tabindex="0"
                                                                class="page-link">Previous</a></li>
                                                        <li class="paginate_button page-item active"><a href="#"
                                                                aria-controls="table_id" data-dt-idx="1" tabindex="0"
                                                                class="page-link">1</a></li>
                                                        <li class="paginate_button page-item next disabled"
                                                            id="table_id_next"><a href="#" aria-controls="table_id"
                                                                data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                <h5 class="modal-title" id="exampleModalLabel">อัพเดตสถานะการจัดส่ง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="m-f-employee">
                    {{-- <div class="group_data"> --}}
                    <input type="hidden" name="m-id" id="m-id" value="">

                    <div class="row col-md-12">
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                สถานะปัจจุบัน <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <select select name="cust_name" id="cust_name" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    <option value="001">พนักงานเข้ารับสินค้าที่คลังสินค้าแล้ว</option>
                                    <option value="002">อยู่ระหว่างการขนส่งสินค้า</option>
                                    <option value="003">จัดส่งสินค้าสำเร็จ</option>
                                    <option value="004">พนักงานนำส่งเอกสาร</option>
                                </select>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                หมายเหตุ <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <textarea type="number" name="m-id_card" id="m-id_card" class="form-control"> </textarea>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                ลายเซ็น <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <textarea  name="m-id_card" id="m-id_card" class="form-control"> </textarea>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                แนบไฟล์ <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <input type="number" name="m-id_card" id="m-id_card" class="form-control">
                            </div>
                        </div>

                    </div>


                    {{-- </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button id="save-data" type="button" class="btn btn-primary btn-sm"
                    onclick="BtnEdit(); false">อัพเดตสถานะ</button>
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