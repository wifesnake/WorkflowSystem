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

            {{-- <div class="card mt-2">
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
            </div> --}}

            <div class="card mt-2">
                <section class="m-2">
                    <div class="com-md-12 table-responsive">
                        <table id="table-expense" class="table dataTable">
                            <thead>
                                <th>เลขที่เอกสาร</th>
                                <th>คนขับ</th>
                                <th>หมายเลขโทรศัพท์</th>
                                <th>ทะเบียนรถ</th>
                                <th>ประเภทรถ</th>
                                <th>วันที่เข้ารับสินค้า</th>
                                <th>สถานะ</th>
                                <th>#</th>
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
                                    <table id="table-getexpense" class="table dataTable">
                                        <thead>
                                            <th>ประเภทค่าใช้จ่าย</th>
                                            <th>จำนวนเงิน</th>
                                            <th>หมายเหตุ</th>
                                            <th>ไฟล์</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </section>
                        </div>

                        <div class="card mt-2">
                            <section class="m-2">
                                <div class="com-md-12 table-responsive">
                                    <table id="table-order" class="table dataTable">
                                        <thead>
                                            <th>(เลขที่ออเดอร์)</th>
                                            <th>PO Number.</th>
                                            <th>Customer Name</th>
                                            <th>ผู้รับ</th>
                                            <th>สถานะออเดอร์</th>
                                            <th>สถานะ</th>
                                            <th>#</th>
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
            <div class="modal-footer">
                {{-- <button id="save-data" type="button" class="btn btn-primary btn-sm"
                    onclick="sendProduct()">ส่งงาน</button>
                <button id="cancel-data" type="button" class="btn btn-danger btn-sm"
                    data-dismiss="modal">ยกเลิก</button>  --}}
                <button id="cancel-data" type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">อัพเดตสถานะการจัดส่ง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                สถานะปัจจุบัน <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <select name="cust_name" id="cust_name" onchange="dependModal2(this)" class="form-control">
                                    <option value="">-- Please Select --</option>
                                    <option value="001">พนักงานเข้ารับสินค้าที่คลังสินค้าแล้ว</option>
                                    <option value="002">อยู่ระหว่างการขนส่งสินค้า</option>
                                    <option value="003">จัดส่งสินค้าสำเร็จ</option>
                                    <option value="004">พนักงานนำส่งเอกสาร</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 isShow">
                                <div class="row">
                                    <div class="col-md-3">
                                        ลายเซ็น <b class="request-data">**</b> :
                                    </div>
                                    <div class="col-md-9">
                                        {{-- <textarea  name="m-id_card" id="m-id_card" class="form-control"> </textarea> --}}
                                        {{-- <form method="POST" action="{{ route('upload.signature') }}"> --}}
                                            {{-- @csrf
                                            <div class="col-md-12"> --}}
                                                {{-- <label class="" for="">Signature:</label> --}}
                                                {{-- <input name="order_signature" id="order_signature" class="form-control" type="hidden" value=""> --}}
                                                {{-- <input type="hidden" name="form5_username" id="form5_username" value="{{ Auth::user()->name }}"> --}}
                                                <div id="sig" ></div>
                                                <br/>
                                                <br/>
                                                <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                                                <textarea id="signature64" name="signed" style="display: none"></textarea>
                                            {{-- </div> --}}
                                            {{-- <br/> --}}
                                            {{-- <button class="btn btn-success">Save</button> --}}
                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 isShow">
                                <div class="row">
                                    <div class="col-md-3">
                                        แนบไฟล์ <b class="request-data">**</b> :
                                    </div>
                                    <div class="col-md-9">
                                        <textarea  name="m-id_card" id="m-id_card" class="form-control"> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="save-data" type="button" class="btn btn-primary btn-sm" >บันทึก</button>
                <button id="cancel-data" type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<style>
    .modal {
        overflow-y:auto;
    }
</style>

<script>
    $(document).ready(async function(){
        await init();
    });

    async function init(){
        await getListExpense();

        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    }

    async function getListExpense(){
        if ($.fn.dataTable.isDataTable('#table-expense')) {
            $('#table-expense').DataTable().destroy();
        }
        $('#table-expense').dataTable({
            ajax:{
                url: "/api/progress/listexpense",
                type: "get"
            },
            processing: true,
            destroy: true,
            columns:[
                {data: "product_id"},
                {data: "fullname",className:"text-nowrap"},
                {data: "phone"},
                {data: "regis_id"},
                {data: "cartype"},
                {data: "pickup_date"},
                {data: "status"},
                {
                    data: null,
                    render:function(data,type,row){
                        return '<td><div onClick="getOrder(\''+data.product_id +'\')" class="btn btn-sm btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">View</div></td>';
                    }
                }
            ]
        });
    }

    async function getOrder(product_id){
        if ($.fn.dataTable.isDataTable('#table-getexpense')) {
            $('#table-getexpense').DataTable().destroy();
        }
        $('#table-getexpense').dataTable({
            ajax:{
                url: "/api/progress/getexpense/"+product_id,
                type: "get"
            },
            processing: true,
            destroy: true,
            columns:[
                {data: "paytype"},
                {data: "amount",className:"text-nowrap"},
                {data: "remark"},
                {
                    data: null,
                    render:function(data,type,row){
                        return '<img src="'+ data.base64 +'" width="150px">';
                    }
                }
            ]
        });

        getOrder2(product_id);
    }

    async function getOrder2(product_id){

        if ($.fn.dataTable.isDataTable('#table-order')) {
            $('#table-order').DataTable().destroy();
        }
        $('#table-order').dataTable({
            ajax:{
                url: "/api/progress/getorder/"+product_id,
                type: "get"
            },
            processing: true,
            destroy: true,
            columns:[
                {data: "order_id"},
                {data: "po"},
                {data: "customer_name"},
                {data: "to_name",className:"text-nowrap"},
                {data: "ismainorder"},
                {data: "current_state"},
                {
                    data: null,
                    render:function(data,type,row){
                        return data.ismainorder == 1 ? "<div class='btn btn-success text-nowrap' data-toggle='modal' data-target='#exampleModal2' onClick='checkTrackList(\""+ data.current_state +"\")' >อัพเดทสถานะ</div>" : "";
                    }
                },
                {
                    data: null,
                    render:function(data,type,row){
                        return data.ismainorder == 1 ? "<div class='btn btn-danger text-nowrap'>ยกเลิกการส่งสินค้า</div>" : "";
                    }
                }
            ]
        });
    }

    async function checkTrackList(data) {
        $('.isShow').css('display','none');
        $('[name=cust_name]').find('option').remove().end();
        const query = [
            {
                value: "04",
                text: "พนักงานเข้ารับสินค้าที่คลังสินค้าแล้ว"
            },
            {
                value: "05",
                text: "อยู่ระหว่างการขนส่งสินค้า"
            },
            {
                value: "06",
                text: "จัดส่งสินค้าสำเร็จ"
            },
            {
                value: "07",
                text: "พนักงานนำส่งเอกสาร"
            }
        ]
        query.forEach(item => {
            if(Number(item.value) < Number(data)){
                $('[name=cust_name]').append("<option value=\""+ item.value +"\" disabled>"+ item.text +"</option>")
            }else{
                $('[name=cust_name]').append("<option value=\""+ item.value +"\">"+ item.text +"</option>")
            }
        });
    }

    async function dependModal2(elem){
        console.log(elem.value);
        if(elem.value != "06"){
            $('.isShow').css('display','none');
        }else{
            $('.isShow').css('display','block');
        }
    }
</script>

@endsection