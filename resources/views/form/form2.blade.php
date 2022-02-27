<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="form-group">
            <label for="" class="label-control">ข้อมูลออเดอร์</label>
            <select class="form-control" name="listOrder"></select>
        </div>
    </div>
    <div class="col-md-3 col-lg-4"></div>
    <div class="col-md-3 col-lg-4"></div>
</div>
<div class="row">
    <div class="col-md-4">
        <label>รหัสออเดอร์:</label>&nbsp;<label class="label-order_id">-</label>
    </div>
    <div class="col-md-4">
        <label>รหัสPO:</label>&nbsp;<label class="label-po">-</label>
    </div>
    <div class="col-md-4">
        <label>รหัสออเดอร์:</label>&nbsp;<label class="label-order_id">-</label>
    </div>
</div>

<script>
    $(document).ready(function(){
        init();

        //Handle
        $('[name="listOrder"]').on('change',async function () {
            const selected = $(this);
            const order_id = selected.val();
            await $.post('/api/getDataListOrder',{order_id : order_id},function (res) {
                const { data } = res;
                if(data){
                    data.forEach(item => {
                        $('.label-order_id').html(item.order_id);
                        $('.label-po').html(item.po);
                    });
                }
            });
        });
    });

    async function init() {
        await getListOrder();
    }

    async function getListOrder(params) {
        await $.get('/api/listorder',function (res) {
            const { data } = res;
            if(data){
                const option = $("<option selected>").val('').text('กรุณาเลือกออเดอร์');
                $('[name="listOrder"]').append(option);
                data.forEach(item => {
                    // $('[name=listOrder]').append('<option>a</option>')
                    const opt = $("<option>").val(item.order_id).text(item.to_name);
                    $('[name="listOrder"]').append(opt);
                });
            }
        });
    }

    async function getDataListOrder(){
        await $.get('/api/listorder',function (res) {
            const { data } = res;
            if(data){
                data.forEach(item => {
                    // $('[name=listOrder]').append('<option>a</option>')
                    var opt = $("<option>").val(item.order_id).text(item.to_name);
                    $('[name="listOrder"]').append(opt);
                });
            }
        });
    }
</script>
