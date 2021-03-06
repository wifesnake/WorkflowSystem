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
                                ชื่อบริษัท <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-2" style="display:none;">
                                @foreach ($customerno as $item)
                                <input type="text"  disabled name="customer_id" id="customer_id" class="form-control"
                                    value="{{ $item->runno }}">
                                @endforeach
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="customer_name" id="customer_name" class="form-control">
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
                                <input type="text" name="phone" id="phone" class="form-control">
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-3">
                                เลขที่นิติบุคคล <b class="request-data">**</b> :
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="customer_person_number" id="customer_person_number"
                                    class="form-control">
                            </div>

                        </div>

                        <div class="menu-action col-md-12">
                            <input id="save-data" type="button" class="btn btn-primary" value="บันทึกข้อมูล"
                                onclick="BtnSave();" />
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
                <form action="#" id="m-f-customer">
                    {{-- <div class="group_data"> --}}
                    <input type="hidden" name="m-id" id="m-id" value="">
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
                            <input type="text" disabled name="m-customer_id" id="m-customer_id" class="form-control">
                        </div>
                        <div class="col-md-7">
                            <input type="text" name="m-customer_name" id="m-customer_name" class="form-control">
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            ที่อยู่ <b class="request-data">**</b> :
                        </div>
                        <div class="col-md-9">
                            <textarea name="m-address" id="m-address" class="form-control" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            หมายเลขโทรศัพท์ <b class="request-data">**</b> :
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="m-phone" id="m-phone" class="form-control">
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-3">
                            เลขที่นิติบุคคล <b class="request-data">**</b> :
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="m-customer_person_number" id="m-customer_person_number"
                                class="form-control">
                        </div>

                    </div>
                    {{-- </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button id="save-data" type="button" class="btn btn-primary btn-sm"
                    onclick="BtnEdit(); false">บันทึกข้อมูล</button>
                <button id="cancel-data" type="button" class="btn btn-danger btn-sm"
                    data-dismiss="modal">ยกเลิก</button>
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<style>
    .d-none{
        display: none;
    }
</style>

<script>
const jsonFormat = {
    "customer_id": "",
    "customer_name": "",
    "address": "",
    "phone": "",
    "customer_person_number": "",
    "created_by": '{{ Auth::user()->name }}',
    "updated_by": '{{ Auth::user()->name }}'
}

$(document).ready(function(){
    // $('#customer-table tbody').on('click', 'tr', function () {
    //     var customer_id = $(this)[0].cells[0].innerText;
    //     $.ajax({
    //         url: "{{url('api/customer')}}/" + customer_id,
    //         type: "GET",
    //         data: {},
    //         success: function(response, status) {
    //             if (response) {
    //                 $('[name=m-id]').val(customer_id);
    //                 const data = response.data;
    //                 $.each(jsonFormat, function(key, value) {
    //                     $('[name=m-' + key + ']').val(data[key]).prop("disabled",true);
    //                 });
    //                 $('.modal-footer').prop("class","modal-footer d-none");
    //                 $("#exampleModal").modal("show");
    //             }
    //         },
    //     });
    // });
});

function onEdit(id,isView) {

    if(isView == "view"){
        $('.modal-footer').prop("class","modal-footer d-none");
    }else{
        $('.modal-footer').prop("class","modal-footer");
    }

    $.ajax({
        url: "{{url('api/customer')}}/" + id,
        type: "GET",
        data: {},
        success: function(response, status) {
            if (response) {
                $('[name=m-id]').val(id);
                const data = response.data;
                $.each(jsonFormat, function(key, value) {
                    $('[name=m-' + key + ']').val(data[key]);
                    if(key != "customer_id"){
                        $('[name=m-' + key + ']').prop("disabled",false)
                    }
                    if(isView == "view"){
                        $('[name=m-' + key + ']').prop("disabled",true);
                    }else{
                        $('[name=m-' + key + ']').prop("disabled",false);
                    }
                });
            }
        },
    });
}

function onDelete(id, name) {

    swal({
        title: "",
        text: "คุณแน่ใจว่าต้องการลบข้อมูลบริษัท " + name,
        icon: "warning",
        buttons: {
            confirm: true,
            cancel: true,
        },
        infoMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {

            $.ajax({
                url: "{{url('api/customer')}}/" + id,
                type: "DELETE",
                data: {},
                success: function(response, status) {
                    if (status == "success") {
                        window.location.href = "{{ url('/customer') }}";
                    }
                },
            });

        } else {
            return false;
        }
    });


}

function BtnSave() {

    swal({
        title: "",
        text: "คุณแน่ใจว่าต้องการบันทึกข้อมูลนี้ ?",
        icon: "warning",
        buttons: {
            confirm: true,
            cancel: true,
        },
        infoMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            let isPost = true;
            $('#f-customer').find('select,input,textarea').each(function(i, box) {
                const name = $(box).attr('name');
                if (name) {
                    if ($('[name=' + name + ']').val().trim() == "") {
                        isPost = false;
                        $('[name=' + name + ']').focus();
                    };
                    jsonFormat[name] = $('[name=' + name + ']').val();
                }
            });

            console.log(jsonFormat);

            if (isPost) {
                $.ajax({
                    url: "{{url('api/customer')}}",
                    type: "POST",
                    data: jsonFormat,
                    success: function(response, status) {
                        if (status == "success") {
                            window.location.href = "{{ url('/customer') }}";
                        }
                    },
                });
            }

        } else {
            return false;
        }
    });


}

function BtnEdit() {

    swal({
        title: "",
        text: "คุณแน่ใจว่าต้องการแก้ไขข้อมูลบริษัท ?",
        icon: "warning",
        buttons: {
            confirm: true,
            cancel: true,
        },
        infoMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {


            let isPost = true;
            $('#m-f-customer').find('select,input,textarea').each(function(i, box) {
                const name = $(box).attr('name');
                if (name) {
                    if ($('[name=' + name + ']').val().trim() == "") {
                        isPost = false;
                        $('[name=' + name + ']').focus();
                    };
                    const nameFormat = name.replace('m-', '')
                    jsonFormat[nameFormat] = $('[name=' + name + ']').val();
                }
            });

            const id = $('[name=m-id]').val();

            if (isPost) {
                $.ajax({
                    url: "{{url('api/customer')}}/" + id,
                    type: "PUT",
                    data: jsonFormat,
                    success: function(response, status) {
                        if (status == "success") {
                            window.location.href = "{{ url('/customer') }}";
                        }
                    },
                });
            }

        } else {
            return false;
        }
    });

}
</script>

@endsection
