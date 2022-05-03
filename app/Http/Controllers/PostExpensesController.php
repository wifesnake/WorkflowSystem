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

    public function ListProduct(){
        //$data = DB::select("SELECT t1.product_id,concat(t3.name,' ',t3.lastname) as fullname,t3.phone,t4.regis_id,t5.value_lookup, CONCAT( DATE_FORMAT( t1.pickup_date , '%d' ), '/', DATE_FORMAT( t1.pickup_date , '%m' ) ,'/', DATE_FORMAT( t1.pickup_date , '%Y' ) ) AS pickup_date, t1.on_status as on_status_code, t6.value_lookup as on_status FROM `ord_product` t1 INNER JOIN tb_employee_car t2 on t2.car_id = t1.car_id INNER JOIN employees t3 ON t3.employee_id = t2.employee_id INNER JOIN tb_vehicle t4 ON t4.car_id = t1.car_id INNER JOIN tb_lookup t5 ON t5.code_lookup = t4.isTrucktype and t5.name_lookup = 'vehicletype' INNER JOIN tb_lookup t6 ON t6.code_lookup = t1.on_status AND t6.name_lookup = 'order_product' WHERE t1.status = ? and t1.on_status = ? GROUP BY t1.product_id,t3.name,t3.lastname,t3.phone,t4.regis_id,t5.value_lookup,t1.pickup_date,t1.on_status,t6.value_lookup;",[1,"02"]);
        $sql = "SELECT DISTINCT t1.product_id,concat(t3.name,' ',t3.lastname) as fullname,t3.phone as to_phone,t5.regis_id,t6.value_lookup as vehicletype,".
        "CONCAT( DATE_FORMAT( t1.pickup_date , '%d' ), '/', DATE_FORMAT( t1.pickup_date , '%m' ) ,'/', DATE_FORMAT( t1.pickup_date , '%Y' ) ) AS pickup_date,".
        // "t7.current_state,t2.order_id,t1.on_status".
        "t1.on_status".
        " FROM ord_product t1".
        " INNER JOIN ord_productdetail t2 on t2.product_id = t1.product_id".
        " INNER JOIN employees t3 on t3.employee_id = t1.employee_code".
        " INNER JOIN tb_order t4 on t4.order_id = t2.order_id".
        " INNER JOIN tb_vehicle t5 on t5.car_id = t1.car_id".
        " INNER JOIN tb_lookup t6 on t6.code_lookup = t5.isTrucktype and t6.name_lookup = 'vehicletype'".
        " WHERE (t1.product_id not in (".
        "SELECT product_id from (".
        "SELECT t1.product_id,t2.ord_vehicle,t2.current_state from ord_productdetail t1 ".
        "LEFT JOIN (SELECT ord_vehicle,max(current_state) as current_state FROM states WHERE current_state = '09' GROUP BY ord_vehicle) t2 on t2.ord_vehicle = t1.order_id".
        ") t1 where ord_vehicle is null".
        ") or t1.on_status = '02') and t1.status = ?;";
        $data = DB:: select($sql,[1]);
        return [
            "success" => true,
            "data" => $data
        ];
    }

    public function GetOrder($product_id){
        $data = DB::select("SELECT t1.order_id,t2.po,t3.customer_name,.t2.to_name,t2.weight, CONCAT( DATE_FORMAT( t4.pickup_date , '%d' ), '/', DATE_FORMAT( t4.pickup_date , '%m' ) ,'/', DATE_FORMAT( t4.pickup_date , '%Y' ) ) AS pickup_date, t1.ismainorder FROM ord_productdetail t1 INNER JOIN tb_order t2 ON t2.order_id = t1.order_id INNER JOIN tb_customer t3 ON t3.customer_id = t2.cust_code INNER JOIN ord_product t4 ON t4.product_id = t1.product_id WHERE t4.status = ? AND t1.product_id = ? GROUP BY t1.order_id,t2.po,t3.customer_name,.t2.to_name,t2.weight,t4.pickup_date,t1.ismainorder;",[1,$product_id]);
        return [
            "success" => true,
            "data" => $data
        ];
    }

    public function GetExpenses($product_id){
        $data = DB::select("SELECT t1.id,t1.product_id,t1.expent_type,t1.amount,t1.remark,t2.id as image_id,t2.base64 FROM `tb_expent` t1 LEFT JOIN tb_image t2 ON t2.type_image = concat('image_',?,'_',t1.expent_type,'_',t1.amount,'_',t1.remark) and t2.status = 1 where t1.product_id = ?;",[$product_id,$product_id]);
        return [
            "success" => true,
            "data" => $data
        ];
    }

    public function addExpense(Request $request){
        $model = new ExpenseModel();
        $model->product_id = $request->product_id;
        $model->expent_type = $request->expenese_type;
        $model->amount = $request->amount;
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
