@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <div class="title-header">รายการจัดส่งสินค้า</div>

                <div class="card mt-2">
                    <section class="m-2">
                        <div class="com-md-12 table-responsive">
                            <table id="table_id" class="table dataTable">
                                <thead>
                                    <tr>
                                        <th>Tracking No.</th>
                                        <th>PO Number.</th>
                                        <th>Customer Name</th>
                                        <th>ผู้รับ</th>
                                        <th>รายละเอียด</th>
                                        <th>จำนวน</th>
                                        <th>น้ำหนัก</th>
                                        <th>สถานะ</th>
                                        <th>Create</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
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

    <script>
        $(document).ready(function(){

            // on load
            init_onload();

            // call function
            function init_onload(){
                getDatable();
            }

            function getDatable(){
                $('#table_id').DataTable({
                    "ajax":{
                        url: "/api/flows",
                        type: "get"
                    },
                    "processing": true,
                    "order": [[ 2, "desc" ]],
                    "columns": [
                        { "data": "ord_vehicle" },
                        { "data": "ord_vehicle" },
                        { "data": "updated_by" },
                        { "data": "updated_by" },
                        { "data": "state_name" },
                        { "data": "datetime_th" },
                        {
                            data: null,
                            render:function(data,type,row){
                                return "<div class='btn btn-primary' onClick='ViewData(\""+ data.ord_vehicle +"\");' >View</div>";
                            }
                        }
                    ]
                });
            }
        });

        function ViewData(ordno){
            window.location.href = "{{ url('/form/') }}/" + ordno;
        }
    </script>

@endsection
