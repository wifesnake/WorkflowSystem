@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="title-header">ยินดีต้อนรับ เข้าสู่ระบบจัดการข้อมูล </div>
            <div class="group_data">
                <div class="data-text">ห้างหุ้นส่วนจำกัด วิเชียร ทรานสปอร์ต VICHIAN TRANSPORT LIMITED PARTNERSHIP</div>
                <div class="data-text">เลขทะเบียน : 0103532019581</div>
                <div class="data-text">ที่อยู่ : 158/104-5 ซอย จรัญสนิทวงศ์ 8 ถนน จรัญสนิทวงศ์ แขวง วัดท่าพระ
                    เขตบางกอกใหญ่ กรุงเทพมหานคร 10600</div>
                <div class="data-text">ประกอบธุรกิจ การขนส่งสินค้าอื่นๆทางถนนซึ่งมิได้จัดประเภทไว้ในที่อื่น</div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    You are admin.
                </div>
            </div>
        </div>
    </div>
</div> -->

@endsection