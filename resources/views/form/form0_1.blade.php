<form action="#" id="f-request">

    <div id="f-field1" class="group_data">
        <div class="col-md-12">
            <div class="title-form">
                ข้อมูลการจัดส่งสินค้า
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                เลขที่ Tracking Number :
            </div>
            <div class="col-md-8">
                <input name="order_id" disabled id="order_id" class="form-control" type="text" value="">
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                เลขที่ PO :
            </div>
            <div class="col-md-8">
                <input name="po" id="po" class="form-control" type="text">
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                รหัสลูกค้า :
            </div>
            <div class="col-md-8">
                <input name="cust_code" disabled id="cust_code" class="form-control"
                    type="text">
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                ชื่อลูกค้า <b class="request-data">**</b> :
            </div>
            <div class="col-md-8">
                <select name="cust_name" id="cust_name" class="form-control">
                    <option value="">-- Please Select --</option>
                    @foreach ($tb_customer as $item)
                    <option value="{{$item->customer_id}}">{{$item->customer_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                ที่อยู่ลูกค้า :
            </div>
            <div class="col-md-8">
                <textarea name="cust_address" disabled id="cust_address" class="form-control"
                    rows="4"></textarea>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                เลขที่นิติบุคคล :
            </div>
            <div class="col-md-8">
                <input name="cust_presonalcode" disabled id="cust_presonalcode" class="form-control"
                    type="text">
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                หมายเหตุจากลูกค้า :
            </div>
            <div class="col-md-8">
                <textarea name="order_remark" id="order_remark" class="form-control"
                    rows="4"></textarea>
            </div>
        </div>
    </div>

    <div id="f-field2" class="group_data">

        <div class="col-md-12">
            <div class="title-form">
                ข้อมูลผู้รับสินค้า
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                ชื่อ-นามสกุล <b class="request-data">**</b> :
            </div>
            <div class="col-md-8">
                <input name="to_name" id="to_name" class="form-control" type="text">
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                ที่อยู่ <b class="request-data">**</b> :
            </div>
            <div class="col-md-8">
                <textarea name="to_address" id="to_address" class="form-control" rows="4"></textarea>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                โทรศัพท์ <b class="request-data">**</b> :
            </div>
            <div class="col-md-8">
                <input name="to_phone" id="to_phone" class="form-control" type="text">
            </div>
        </div>
    </div>

    <div id="f-field3" class="group_data">
        <div class="col-md-12">
            <div class="title-form">
                รายละเอียดสินค้า
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-3">
                รายละเอียดสินค้า <b class="request-data">**</b> :
            </div>
            <div class="col-md-8">
                <input name="product_type" id="product_type" class="form-control" type="text">
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                ประรถที่ต้องการ <b class="request-data">**</b> :
            </div>
            <div class="col-md-8">
                <select name="car_type" id="car_type" class="form-control">
                    <option value="">-- Please Select --</option>
                    @foreach ($usevehicle as $item)
                    <option value="{{$item->code_lookup}}">{{$item->value_lookup}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                จำนวน <b class="request-data">**</b> :
            </div>
            <div class="col-md-8">
                <input name="unit" id="unit" class="form-control" type="text">
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                น้ำหนัก <b class="request-data">**</b> :
            </div>
            <div class="col-md-8">
                <input name="weight" id="weight" class="form-control" type="text">
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-3">
                Remark :
            </div>
            <div class="col-md-8">
                <textarea name="remark" id="remark" class="form-control" rows="4"></textarea>
            </div>
        </div>
    </div>
</form>
