<?php

namespace App\Http\Controllers;

use App\Models\ExpenseModel;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostExpensesController extends Controller
{

    public function ListProduct(){
        $data = DB::select("SELECT t1.product_id,concat(t3.name,' ',t3.lastname) as fullname,t3.phone,t4.regis_id,t5.value_lookup, CONCAT( DATE_FORMAT( t1.pickup_date , '%d' ), '/', DATE_FORMAT( t1.pickup_date , '%m' ) ,'/', DATE_FORMAT( t1.pickup_date , '%Y' ) ) AS pickup_date, t1.on_status FROM `ord_product` t1 INNER JOIN tb_employee_car t2 on t2.car_id = t1.car_id INNER JOIN employees t3 ON t3.employee_id = t2.employee_id INNER JOIN tb_vehicle t4 ON t4.car_id = t1.car_id INNER JOIN tb_lookup t5 ON t5.code_lookup = t4.isTrucktype and t5.name_lookup = 'vehicletype' WHERE t1.status = ? and t1.on_status = ? GROUP BY t1.product_id,t3.name,t3.lastname,t3.phone,t4.regis_id,t5.value_lookup,t1.pickup_date,t1.on_status;",[1,"01"]);
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
        $data = DB::select("SELECT id,product_id,expent_type,amount,remark FROM `tb_expent` where product_id = ?;",[$product_id]);
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

    public function deleteExpense($id){
        $model = ExpenseModel::firstOrFail($id);
        if($model->delete()){
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

        $data = DB::update("update ord_product set on_status = '02' where product_id = '". $product_id ."' and status = 1");

        if($data){
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
