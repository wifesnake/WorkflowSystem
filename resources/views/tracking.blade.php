<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('storage/images/WCLogo.ico') }}" type="image/icon type">
    <title>VICHIAN TRANSPORT LIMITED PARTNERSHIP</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    {{-- Script --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
    html,
    body,
    ul,
    li,
    ol,
    dd,
    dl,
    dt,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    i,
    s,
    img,
    input {
        margin: 0;
        padding: 0;
    }

    .icon-truck {
    font-size: 22px;
}

span.line {
    display: none;
}

.tab-log li {
    margin-bottom: 12px;
    margin-top: 10px;
}

    .main-data {
    margin-bottom: 60px;
}


    html,
    body {
        height: 100%;
        /* ให้ html และ body สูงเต็มจอภาพไว้ก่อน */
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Kanit', sans-serif !important;
        font-size: 16px;
        background: white;
    }


    .waybill-query-res {
        background-color: #F9F9F9;
        overflow: hidden;
        margin-bottom: 60px;
    }

    .res-title {
        display: flex;
        padding: 20px;
        box-sizing: border-box;
        align-items: center;
        line-height: 20px;
        /* border-bottom: 1px solid rgba(220, 220, 220, 1); */
        background-color: #ffffff;
    }

    .res-info {
        padding: 0px 30px;
        box-sizing: border-box;
        /* background-color: #fff; */
        font-size: 14px;
        font-weight: 400;
        color: rgba(19, 33, 58, 1);
        margin: 25px 30px 0;
        word-break: break-all;
        position: relative;
        /* border-bottom: 1px solid rgba(220, 220, 220, 1); */
        display: flex;
    }

    .res-info-2 {
        padding: 5px 30px;
        box-sizing: border-box;
        font-size: 14px;
        font-weight: 400;
        color: rgba(19, 33, 58, 1);
        margin: 0 30px;
        word-break: break-all;
        position: relative;
        border-bottom: 1px solid rgba(220, 220, 220, 1);
        display: flex;
    }

    .tab-title {
        height: 70px;
        display: flex;
        border-bottom: 1px solid rgba(220, 220, 220, 1);
        box-sizing: border-box;
        /* justify-content: space-evenly; */
        align-items: center;
        font-size: 18px;
        font-weight: 400;
        color: rgba(129, 129, 129, 1);
        margin: 0 30px;
    }

    ul,
    ol,
    li {
        list-style: none;
    }

    .tab-con>li {
        /* height: 450px; */
        overflow-y: auto;
        margin: 10px 0;
        box-sizing: border-box;
    }

    .tab-log li {
        line-height: 40px;
        position: relative;
        padding: 15px 30px;
        box-sizing: border-box;
        font-size: 14px;
        font-weight: 400;
        color: rgba(129, 129, 129, 1);
        box-sizing: border-box;
    }

    .tab-log li:nth-child(1) {
        color: #13213A;
    }

    .row {}

    .input-waybill {
        border: 1px solid rgba(204, 204, 204, 1);
        border-radius: 4px;
        overflow: hidden;
        height: 50px;
        box-sizing: border-box;
        padding: 0 0 0 20px;
        display: flex;
    }

    input {
        width: 100%;
        height: 100%;
        background: white;
    }

    i.clear {
        width: 50px;
        height: 50px;
        background: url(/img/waybill-query/close.png) no-repeat center;
        background-size: 20px;
        cursor: pointer;
    }

    .form-button.search-btn {
        width: 174px;
        height: 48px;
        background: #156140cc;
        border-radius: 4px;
        line-height: 48px;
        font-size: 16px;
        font-weight: 300;
        color: white;
        text-align: center;
        cursor: pointer;
    }

    input {
        border: none;
        outline: none;
        margin: 0;
        padding: 0;
    }

    button {
        border: none;
        outline: none;
    }

    .view-page-nav {
        height: 60px;
        position: relative;
    }

    .header.page-nav.header-fixed {
        width: 100%;
        height: 60px;
        background-color: #156140;
        position: fixed;
        z-index: 10000;
        box-shadow: 0 0px 40px rgb(0 0 0 / 60%);
    }

    .content-data {
        padding-left: 3%;
        padding-right: 3%;
        padding-top: 3%;

        display: block;
        min-height: 100%;
        /* real browsers */
        height: auto !important;
        /* real browsers */
        height: 100%;
        /* IE6 bug */
    }


    footer.main-footer {
        background: white;
        color: black;
        font-size: 18px;
        background-color: #fff;
        border-top: 1px solid #dee2e6;
        color: #869099;
        padding: 1rem;
    }

    .Header-top {
        font-size: 30px;
        margin-bottom: 20px;
    }

    html *,
    * {
        filter: initial !important;
    }

    body {
        position: relative;
        width: 100%;
        height: 100%;
    }
    </style>


    <style>
    .cell-1 {
        border-collapse: separate;
        border-spacing: 0 4em;
        background: #fff;
        border-bottom: 5px solid transparent;
        background-clip: padding-box
    }

    thead {
        background: #dddcdc
    }

    .tab-log li .time {
        text-align: center;
        margin-right: 120px;
        display: inline-block;
        vertical-align: text-top;
        line-height: 1.3em;
    }

    .tab-log li.first-log span:nth-child(2) {
        top: 50%;
    }

    .tab-log .line {
        position: absolute;
        left: 220px;
        top: 0;
        bottom: 0;
        width: 1px;
        background-color: #DCDCDC;
    }

    .tab-log .icon {
        width: 32px;
        height: 32px;
        background-size: 32px 32px;
    }

    .tab-log .icon {
        position: absolute;
        /* width: 32px; */
        /* height: 32px; */
        left: 204px;
        top: 0;
        bottom: 0;
        margin: auto;
        /* background-color: pink; */
        border-radius: 50%;
    }

    .tab-log li .text {
        /* min-width: 557px; */
        width: 500px;
        display: inline-block;
        vertical-align: text-top;
        line-height: 1.3em;
    }

    .toggle-btn {
        width: 40px;
        height: 21px;
        background: grey;
        border-radius: 50px;
        padding: 3px;
        cursor: pointer;
        -webkit-transition: all 0.3s 0.1s ease-in-out;
        -moz-transition: all 0.3s 0.1s ease-in-out;
        -o-transition: all 0.3s 0.1s ease-in-out;
        transition: all 0.3s 0.1s ease-in-out
    }

    .toggle-btn>.inner-circle {
        width: 15px;
        height: 15px;
        background: #fff;
        border-radius: 50%;
        -webkit-transition: all 0.3s 0.1s ease-in-out;
        -moz-transition: all 0.3s 0.1s ease-in-out;
        -o-transition: all 0.3s 0.1s ease-in-out;
        transition: all 0.3s 0.1s ease-in-out
    }

    .toggle-btn.active {
        background: blue !important
    }

    .toggle-btn.active>.inner-circle {
        margin-left: 19px
    }

    .tab-log li .text {
        /* min-width: 557px; */
        width: 500px;
        display: inline-block;
        vertical-align: text-top;
        line-height: 1.3em;
    }

    .tab-log li .time {
        text-align: center;
        margin-right: 120px;
        display: inline-block;
        vertical-align: text-top;
        line-height: 1.3em;
    }

    span {
        outline: none;
    }

    .tab-title .tab-active {
        border-bottom: 4px solid #156140;
        color: rgba(0, 0, 0, 1);
    }

    .tab-title p {
        display: flex;
        align-items: center;
        line-height: 65px;
        cursor: pointer;
    }

    .tab-title .tab-active {
        border-bottom: 4px solid #156140;
        color: rgba(0, 0, 0, 1);
    }

    @media screen and (min-width: 1260px) {

        .tab-title-a,
        .tab-title-b {
            padding: 0 40px;
            font-size: 16px;
        }

        .res-info-div-2 .res-pno {
            display: flex;
            justify-content: left;
        }

        .tab-title-a,
        .tab-title-b {
            padding: 0 40px;
            font-size: 16px;
        }

        .res-info-div-1 {
            width: 20%;
            margin: 5px;
            /* background: red; */
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .res-info-div-2 {
            width: 80%;
            margin: 5px 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .res-info-div-2 {
            width: 80%;
            margin: 5px 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }


        .res-info-div-2 .res-pno {
            display: flex;
            justify-content: left;
        }

        .res-sme {
            display: flex;
            justify-content: left;
        }

        .res-info-div {
            height: 170px;
        }

        .res-info-div-2 .m::after {
            content: ' ';
            width: 15px;
            height: 2px;
            position: absolute;
            right: -14px;
            top: 0;
            transform: rotate(-135deg);
            transform-origin: 0 1px;
            background-image: linear-gradient(90deg, #156140, #156140);
        }

        .res-info-div-2 .m {
            width: 74px;
            height: 2px;
            background-image: linear-gradient(270deg, #156140, #156140);
            position: relative;
            margin: 13px;
        }

        .tab-log .icon {
            width: 32px;
            height: 32px;
            background-size: 32px 32px;
        }

        .tab-log .time {
            width: 140px;
        }

        .tab-log li {
            font-size: 12px;
        }

        .tab-log li {
            padding: 0 20px;
            font-size: 12px;
        }

    }


    @media screen and (min-width: 768px) and (max-width: 1259px) {

        .res-info-div-2 .m::after {
            content: ' ';
            width: 15px;
            height: 2px;
            position: absolute;
            right: -14px;
            top: 0;
            display: block;
            transform: rotate(-135deg);
            transform-origin: 0 1px;
            background-image: linear-gradient(90deg, #156140, #156140);
        }

        .res-info-div-2 .m {
            width: 74px;
            height: 2px;
            background-image: linear-gradient(270deg, #156140, #156140);
            position: relative;
            margin: 13px;
        }

        .banner {
            width: 90%;
            margin: 0 auto;
        }

        .res-title-span {
            font-size: 12px;
        }

        .res-title {
            padding: 10px;
        }

        .tab-log li .time {
            margin-right: 54px;
        }

        .tab-log li .text {
            width: calc(100% - 140px);
        }

        .tab-log .line {
            left: 110px;
        }

        .tab-log li {
            padding: 0 20px;
            font-size: 12px;
        }

        .tab-log .icon {
            width: 32px;
            height: 32px;
            background-size: 32px 32px;
        }

        .tab-log .icon {
            left: 95px;
            width: 30px;
            height: 30px;
        }

        .tab-log li .text {
            width: calc(100% - 140px);
        }

        .tab-log li {
            font-size: 12px;
        }


    }
    </style>
</head>

<!-- Script -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/jquery.signature.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker-thai.js') }}"></script>
<script src="{{ asset('js/locales/bootstrap-datepicker.th.js') }}"></script>


<body class="">

    <div class="view-page-nav">
        <div class="header page-nav header-fixed" data-type="pc" style="">
            <div class="banner page-nav-banner">
                <h1 style="color:white; padding-left: 10px;">
                    <!--<a href="/"><img src="/img/logo.png" alt="" srcset=""></a>-->
                </h1>
            </div>
        </div>
    </div>

    <div class="content-data">
        <div class="Header-top">สถานะการจัดส่ง</div>

        <div class="main-data">

            <div class="row">
                <div class="col-md-12">
                    กรอกเลขพัสดุของคุณเพื่อติดตามสถานะการจัดส่ง
                </div>
            </div>

            <div class="input-waybill">
                <input id="tracking_no" type="text" value="" placeholder="ติดตามพัสดุ" maxlength="500"
                    oninput="this.value=this.value.replace(/[\u4e00-\u9fa5]/g,'');">
                <!-- oninput="this.value=this.value.replace(/[\u4e00-\u9fa5]/g,'');" -->
                <i class="clear"></i>
                <div class="form-button search-btn" id="search_tracking">ค้นหา</div>
            </div>

        </div>

        <div class="waybill-query-res banner">
            <div class="res-title"><span class="res-title-span">ผลการค้นหาเลขพัสดุ</span></div>
            <div class="res-info">
                <!--<div class="res-info-div res-info-div-1"><img src="/img/waybill-query/h/5.png" class="div-img-1">
                    <div>เซ็นรับแล้ว</div>
                </div> -->
                <div class="res-info-div res-info-div-2">
                    <div class="res-pno" style="margin-bottom: 14px;">หมายเลขพัสดุ : <label id="trackingid"></label>
                    </div>
                    <div class="res-sme"><span class="s"><label id="sendName"></label> <br> <label
                                id="sendAddress"></label></span><span class="m"></span><span class="e"><label
                                id="toName"></label> <br> <label id="toAddress"></label></span></div>
                </div>
            </div>

            <ul class="tab-title">
                <li class="tab-title-a tab-active">
                    <p data-show="tab-log">ข้อมูลการขนส่ง</p>
                </li>
                <li class="tab-title-b">
                    <p data-show="tab-sign">ใบรับรองการเซ็นรับ</p>
                </li>
            </ul>
            <ul class="tab-con">
                <li class="tab-log" style="">
                    <ul>
                    </ul>
                </li>
            </ul>
            </li>
            <li class="tab-sign none" style="display: none;">
                <div class="tab-pic-row">
                    <div class="tab-pic-label">ใบรับรองการเซ็นรับ</div>
                    <div>วิไลพร แก้วผึ้ง(เจ้าของสินค้า)</div>
                </div>
                <div class="tab-pic-row">
                    <div class="tab-pic-label">ลายเซ็น</div>
                    <div><img
                            src="https://fle-asset-internal.oss-ap-southeast-1.aliyuncs.com/deliveryConfirm/1627357848-be3e1947754c4edebbf784219df631a6.jpg"
                            width="300" alt=""><br></div>
                </div>
            </li>
            </ul>
        </div>

    </div>

</body>



<footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 VICHIAN TRANSPORT LIMITED PARTNERSHIP.</strong>
</footer>

</html>

<script>

$('.waybill-query-res').hide();

$("#search_tracking").click(function($this) {

    var trackingNo = $("#tracking_no").val();
    $.ajax({
        url: "{{url('api/tracking/get')}}/" + trackingNo,
        type: "GET",
        data: {},
        success: function(response, status) {
            console.log(response);

            if (status == "success") {


                if (response.data.length == 0) {

                    swal("Oops", "ไม่พบหมายเลข Tracking หรือ PO นี้ในระบบ !", "error");

                } else {

                    $('.waybill-query-res').show();

                    for (i = 0; i < response.data.length; i++) {

                        var FullDateTime = response.data[i].created_at;
                        const ArreyDateTime = FullDateTime.split(" ");
                        var NewDate = ArreyDateTime[0].split("-");
                        var UseDate = NewDate[2] + "-" + NewDate[1] + "-" + NewDate[0];
                        var UseTime = ArreyDateTime[1];

                        var Status = response.data[i].current_state;
                        var StatusName = "";
                        var TextDescription = "";
                        var Remark = "";

                        if (Status == "00") {

                            $("#trackingid").text(response.data[i].ord_vehicle);
                            $("#sendName").text(response.data[i].customer_name);
                            $("#sendAddress").text(response.data[i].address);
                            $("#toName").text(response.data[i].to_name);
                            $("#toAddress").text(response.data[i].to_address);

                            StatusName = "รับออเดอร์แล้ว";
                            TextDescription = "เจ้าหน้าที่บันทึกเข้าสู่ข้อมูลเรียบร้อยแล้ว";
                        } else if (Status == "01") {
                            StatusName = "ดำเนินการจัดหารถ";
                            TextDescription = "เจ้าหน้าที่ทำการจัดหารถที่จะเข้าไปรับพัสดุ";
                        } else if (Status == "02") {
                            StatusName = "จัดสรรค่าใช้จ่ายสำหรับเดินทาง";
                            TextDescription =
                                "เจ้าหน้าที่ทำการจัดการค่าใช้จ่ายสำหรับเดินทางส่งสินค้า";
                        } else if (Status == "03") {
                            StatusName = "พนักขนส่งเตรียมเข้ารับสินค้า";
                            TextDescription = "เจ้าหน้ารับทราบงานและเตรียมที่จะเข้าไปรับพัสดุ";
                        } else if (Status == "04") {
                            StatusName = "พนักงานเข้ารับสินค้าแล้ว";
                            TextDescription = "เจ้าหน้าที่ทำการเข้ารับพัสดุแล้ว";
                        } else if (Status == "05") {
                            StatusName = "อยู่ระหว่างการขนส่ง";
                            TextDescription = "อยู่ระหว่างเดินทางขนส่งสินค้าให้ลูกค้า";
                        } else if (Status == "06") {
                            StatusName = "อยู่ระหว่างการจัดส่ง";
                            TextDescription = "พนักงานทำการนำสินค้าเข้าไปจัดส่งให้ลูกค้า";
                        } else if (Status == "07") {
                            StatusName = "จัดส่งพัสดุสำเร็จ รับโดย 【" + response.data[i].to_name +
                                "】 ขอบคุณที่ใช้บริการ วิเชียรทรานสปอร์ต";
                        } else {
                            StatusName = "";
                        }

                        if (Remark != "" && Remark != null) {
                            Remark = "<br>" + "** หมายเหตุ : " + response.data[i].remark;
                        }

                        if (Status == "07") {

                            $('.tab-log ul').append('<li class="first-log"><span class="time">' +
                                UseDate +
                                '<br>' + UseTime +
                                '</span><span class="line"></span><span class="icon route_icon_5 icon-truck "></span><span class="text">' +
                                StatusName + '<br>' + TextDescription + Remark + '</span></li>');

                        } else if (Status == "00") {

                            $('.tab-log ul').append('<li class="end-log"><span class="time">' +
                                UseDate + '<br>' + UseTime +
                                '</span><span class="line"></span><span class="icon route_icon_1no icon-truck "></span><span class="text"> ' +
                                StatusName + '<br>' + TextDescription + Remark +
                                '</span></li> </span></li>');

                        } else {

                            $('.tab-log ul').append('<li><span class="time">' + UseDate + '<br>' +
                                UseTime +
                                '</span><span class="line"></span><span class="icon route_icon_3no icon-truck "></span><span class="text"> ' +
                                StatusName + '<br>' + TextDescription + Remark +
                                '</span></li> </span></li>');

                        }


                    }

                }


            } else {
                swal("Oops", "Something went wrong!", "error");
            }

        },
    });

});
</script>