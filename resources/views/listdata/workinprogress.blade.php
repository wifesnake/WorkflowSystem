@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card mt-2">
                    <section class="m-2">
                        <div class="com-md-12 table-responsive">
                            <table id="table_id" class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
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
            // $.get("/api/flows",function(data,status){
            //     $('#table_id').DataTable({
            //         "processing": true,
            //         "data": data["data"],
            //         "columns": [
            //             { "data": "ordno" },
            //             {
            //                 data: null,
            //                 className: "dt-center editor-edit",
            //                 defaultContent: '<i class="fa fa-pencil"/>',
            //                 orderable: false
            //             }
            //         ]
            //     });
            // });

            $('#table_id').DataTable({
                "ajax":{
                    url: "/api/flows",
                    type: "get"
                },
                "processing": true,
                "columns": [
                    { "data": "ordno" },
                    {
                        data: null,render:function(data,type,row){return "<div class='btn btn-primary' onClick='ViewData(\""+ data.ordno +"\");' >View</div>";}
                    }
                ]
            });
        });
    </script>

@endsection
