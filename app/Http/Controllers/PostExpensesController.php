<?php

namespace App\Http\Controllers;

use App\Models\ExpenseModel;
use App\Models\Image;
use App\Models\OrderProduct;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostExpensesController extends Controller
{

    public function ListProduct(Request $request){
        $status = $request->status;
        $query= "";
        if($status == ""){
            $query = " or t1.on_status = '02'";
        }else if($status == "02"){
            $query = " and t1.on_status = '02'";
        }else{
            $query = " and t1.on_status = '03'";
        }
        $sql = "SELECT DISTINCT t2.customer_name , t1.product_id,concat(t3.name,' ',t3.lastname) as fullname,t3.phone as to_phone,t5.regis_id,t6.value_lookup as vehicletype,".
        "CONCAT( DATE_FORMAT( t1.pickup_date , '%d' ), '/', DATE_FORMAT( t1.pickup_date , '%m' ) ,'/', DATE_FORMAT( t1.pickup_date , '%Y' ) ) AS pickup_date,".
        "t1.on_status".
        " FROM (SELECT * from ord_product where status = ?) t1".
        " INNER JOIN (select t4.customer_name , t2.order_id , t2.product_id from (select order_id , product_id from ord_productdetail group by product_id) t2 inner JOIN tb_order t3 on t3.order_id = t2.order_id inner JOIN tb_customer t4 on t3.cust_code = t4.customer_id) t2 on t2.product_id = t1.product_id".
        " INNER JOIN employees t3 on t3.employee_id = t1.employee_code".
        " INNER JOIN tb_vehicle t5 on t5.car_id = t1.car_id".
        " INNER JOIN (select * from tb_lookup where name_lookup = 'vehicletype' ) t6 on t6.code_lookup = t5.isTrucktype ".
        " WHERE (t1.product_id not in (".
        "SELECT product_id from (".
        "SELECT t1.product_id,t2.ord_vehicle,t2.current_state from ord_productdetail t1 ".
        "LEFT JOIN (SELECT ord_vehicle,max(current_state) as current_state FROM states WHERE current_state = '09' GROUP BY ord_vehicle) t2 on t2.ord_vehicle = t1.order_id".
        ") t1 where ord_vehicle is null".
        ")".$query.") ;";
        $data = DB:: select($sql,[1]);
        return [
            "success" => true,
            "data" => $data
        ];
    }

    public function GetOrder($product_id){
        $data = DB::select("SELECT CONCAT(t7.name , ' ' , t7.lastname) as fullname , t8.regis_id , t1.order_id,t2.po,t3.customer_name,.t2.to_name,t2.weight, CONCAT( DATE_FORMAT( t4.pickup_date , '%d' ), '/', DATE_FORMAT( t4.pickup_date , '%m' ) ,'/', DATE_FORMAT( t4.pickup_date , '%Y' ) ) AS pickup_date, t1.ismainorder FROM ord_productdetail t1 INNER JOIN tb_order t2 ON t2.order_id = t1.order_id INNER JOIN tb_customer t3 ON t3.customer_id = t2.cust_code INNER JOIN ord_product t4 ON t4.product_id = t1.product_id inner join employees t7 on t4.employee_code = t7.employee_id INNER join tb_vehicle t8 on t4.car_id = t8.car_id WHERE t4.status = ? AND t1.product_id = ? GROUP BY t1.order_id,t2.po,t3.customer_name,.t2.to_name,t2.weight,t4.pickup_date,t1.ismainorder;",[1,$product_id]);
        return [
            "success" => true,
            "data" => $data
        ];
    }

    public function GetExpenses($product_id){
        $data = DB::select("SELECT t1.id,t1.product_id,t1.expent_type,t1.amount,t1.oil,t1.food,t1.trailer,t1.toll,t1.extra,t1.remark,t2.id as image_id,t2.base64 FROM `tb_expent` t1 LEFT JOIN tb_image t2 ON t2.type_image = concat('image_',?,'_',t1.expent_type,'_',t1.amount,'_',t1.remark) and t2.status = 1 where t1.product_id = ?;",[$product_id,$product_id]);
        return [
            "success" => true,
            "data" => $data
        ];
    }

    public function addExpense(Request $request){
        $model = new ExpenseModel();
        $model->product_id = $request->product_id;
        $model->expent_type = $request->expenese_type;
        $model->amount = $request->oil + $request->food + $request->trailer + $request->toll + $request->extra;
        $model->oil = $request->oil;
        $model->food = $request->food;
        $model->trailer = $request->trailer;
        $model->toll = $request->toll;
        $model->extra = $request->extra;
        $model->remark = $request->remark;
        $model->created_by = $request->by;
        if($model->save()){
            return [
                "success" => true,
                "message" => "created successfully"
            ];
        }else{
            return [
                "success" => false,
                "message" => "created unsuccessfully"
            ];
        }
    }

    public function deleteExpense(Request $request){
        $model = ExpenseModel::where('id',$request->id)->firstOrFail();
        if($model->delete()){

            if($request->image_id){
                $model2 = Image::where('id',$request->image_id)->firstOrFail();
                $model2->status = 0;
                $model2->save();
            }

            return [
                "success" => true,
                "message" => "deleted successfully"
            ];

        }else{
            return [
                "success" => false,
                "message" => "deleted unsuccessfully"
            ];
        }
    }

    public function sendProduct(Request $request){
        $product_id = $request->product_id;
        $by = $request->by;

        $data = DB::update("update ord_product set on_status = '03' where product_id = '". $product_id ."' and status = 1");

        if($data){

            $data = DB::select("SELECT order_id FROM ord_productdetail WHERE product_id = ? GROUP BY order_id;",[$product_id]);
            foreach ($data as $item) {
                $state = new States();
                $state->systemcode = $product_id;
                $state->ord_vehicle = $item->order_id;
                $state->prev_state = "02";
                $state->current_state = "03";
                $state->created_by = $by;
                $state->formdata = "";
                $state->updated_by = $by;
                $state->save();
            }

            return [
                "success" => true,
                "message" => "updated successfully"
            ];
        }else{
            return [
                "success" => false,
                "message" => "updated unsuccessfully"
            ];
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
