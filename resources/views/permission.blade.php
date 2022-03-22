@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="position: relative">
    <!-- Main content -->

    <div class="content">
        <div class="container-fluid">

            <div class="title-header">จัดการสิทธิ</div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4" style="text-align: right; font-size: 20px;">
                            <label for="label-role" class="form-label">กลุ่มผู้ใช้งาน</label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="role" id="role" class="form-control">
                                    @foreach ($role_permission as $item)
                                        <option value="{{$item->role_code}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-success" onclick="btnSave()">บันทึกข้อมูล</button>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <table class="table table-bordered" id="table-permission">
                        <thead>
                            <th>เมนู</th>
                            <th>วันที่สร้าง</th>
                            <th>สถานะ</th>
                            <th>สิทธิ์การใช้งาน</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(async function(){
        await loadTable();

        $('#role').on('change',function(){
            loadPermisison();
        });
    });

    async function loadTable(){
        await $('#table-permission').DataTable({
            "ajax":{
                url: "{{url('/api/menu')}}",
                type: "get"
            },
            "processing": true,
            "responsive": true,
            "pageLength": 100,
            "order": [[ 0, "desc" ]],
            "columns": [
                { "data": "name" },
                { "data": "created_at"},
                {
                    data: null,
                    render:function(data,type,row){
                        return data.status == 1 ? "<label class='badge badge-success'>active</label>" : "<label class='badge badge-danger'>inactive</label>";
                    }
                
                },
                {
                    data: null,
                    render:function(data,type,row){
                        let ref = '<div class="form-check">';
                            ref += '<input class="form-check-input" type="checkbox" name="checkbox" id="checkbox_'+data.id+'" value="'+data.id+'">';
                            ref += '<label class="form-check-label" for="checkbox_'+data.id+'">';
                            ref += '</label>';
                            ref += '</div>';
                        return ref;
                    }
                
                }
            ]
        });
        await setTimeout(() => {
            loadPermisison();
        }, 500);
    }

    async function loadPermisison(){

        $('input[type=checkbox]').each(function () {
            $(this).prop('checked',false)
        });

        const selected = $('#role').val();
        $.get(`{{url('api/permission')}}/${selected}`,function(res,status){
            const data = res ? res.data : [];
            data.forEach(item => {
                const elem = $('#checkbox_'+item.menuid);
                elem.prop('checked',true);
            });
        });
    }

    async function btnSave(){
        let listChecked = "";
        $('input[type=checkbox]').each(function () {
            const isTrue = $(this).is(':checked');
            if(isTrue){
                listChecked += $(this).val() +",";
            }
        });
        listChecked += "&";
        listChecked = listChecked.replace(',&','');
        const selected = $('#role').val();
        $.ajax({
            url: `{{url('api/permission')}}/${selected}`,
            type: "PUT",
            data: {
                role: listChecked,
                by: "{{ Auth::user()->name }}"
            },
            success: function(res, status) {
                $(document).Toasts('create', {
                    title: status,
                    body: res.message,
                    autohide: true,
                    delay: 3000,
                    fade: true,
                    class: "bg-success"
                });
            },
        });
    }
</script>

@endsection