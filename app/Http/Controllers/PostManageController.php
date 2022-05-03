<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeCarResource;
use App\Models\CarOrder;
use App\Models\EmployeeCar;
use App\Models\Image;
use App\Models\OrderProduct;
use App\Models\OrderProductDetail;
use App\Models\Runorderno;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('SELECT t1.*,t2.name,t2.lastname,t3.car_brand,t3.regis_id FROM tb_employee_car t1 LEFT JOIN employees t2 ON t2.employee_id = t1.employee_id LEFT JOIN tb_vehicle t3 ON t3.car_id = t1.car_id;');
        return ["data"=>$data];
    }

    public function caremployee_delete(Request $request){
        $car = EmployeeCar::findOrFail($request->id);
        if($car->delete()){
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

    public function add(Request $request){
        $model = new EmployeeCar();
        $model->employee_id = $request->employee;
        $model->car_id = $request->car;
        $model->created_by = $request->created_by;
        $model->updated_by = $request->updated_by;
        if($model->save()){
            return new EmployeeCarResource($model);
        }
    }

    public function carorder(Request $request){
        $by = explode(",",$request->by);
        $car = explode(",",$request->car);
        $order = explode(",",$request->order);
        $ismain = explode(",",$request->ismain);
        $employee = explode(",",$request->employee);
        $date = explode(",",$request->date);
        $product_ids = explode(",",$request->product_id);
        $q = DB::select("select CONCAT(lpad(CONCAT(substring(lpad(now(),4),3,4),lpad(runno,6,'0')),10,'PD'),'TH') as runno FROM tb_runorderno WHERE status = ? and istype = 'orderproduct' LIMIT 1;",[1]);
        $product_no = "";
        foreach ($q as $item) {
            $product_no = $item->runno;
        }
        
        for($i3=0;$i3 < count($product_ids);$i3++){
            if ($product_ids[$i3]) {
                $deleted = OrderProduct::where('on_status','=', '01')
                                       ->where('status', 1)
                                       ->where('product_id', $product_ids[$i3]);
                if($deleted->delete()){
                    $deleted2 = OrderProductDetail::where('status', 1)
                                                  ->where('product_id', $product_ids[$i3])
                                                  ->delete();
                }
            }
        }

        if(count($car) > 1 && count($order) > 1){
            for($i=0;$i<count($car);$i++){
                if($car[$i] != ""){

                    $isProductId = ($product_ids[$i]) ? $product_ids[$i] : $product_no;

                    $exist = OrderProduct::where('product_id',$isProductId)
                                         ->where('status',1)->exists();
                    if(!$exist){
                        $model = new OrderProduct();
                        $model->product_id = $isProductId ;
                        $model->car_id = $car[$i];
                        $model->employee_code = $employee[$i];
                        $model->pickup_date = $date[$i];
                        $model->created_by = $by[$i];
                        $model->updated_by = "";
                        $model->save();
                    }
                }
            }

            for($i2=0;$i2<count($order);$i2++){
                if($order[$i2] != ""){
                    $model2 = new OrderProductDetail();
                    $model2->product_id = ($product_ids[$i2]) ? $product_ids[$i2] : $product_no;
                    $model2->order_id = $order[$i2];
                    $model2->ismainorder = $ismain[$i2];
                    $model2->created_by = $by[$i2];
                    $model2->updated_by = "";
                    $model2->save();
                }
            }

            $q2 = DB::select('select runno from tb_runorderno where istype = "orderproduct"');
            $runno = 0;
            foreach ($q2 as $item) {
                $runno = $item->runno;
            }
            $no = (int)$runno + 1;
            $model3 = Runorderno::where('istype','orderproduct')->firstOrFail();
            $model3->runno = $no;
            if(!$product_ids[0]){
                $model3->save();
            }

            return [
                "success" => true,
                "message" => "created successfully"
            ];

        }else{
            return [
                "success" => false,
                "message" => "no data"
            ];
        }

        // $deleted = CarOrder::where('car_id',$car[0])
        //                     ->where('status',1)
        //                     ->delete();
        // for($i=0;$i<count($car);$i++){
        //     $model = new CarOrder();
        //     $model->car_id = $car[$i];
        //     $model->order_id = $order[$i];
        //     $model->created_by = $by;
        //     $model->updated_by = $by;
        //     $model->status = 1;
        //     $model->save();
        // }
        // return [
        //     "success" => true,
        //     "message" => "created successfully",
        //     "deleted" => $deleted
        // ];
    }

    public function getordproductdetail(Request $request){
        $data = DB::select("SELECT t1.*,t2.car_id,t3.regis_id,t3.car_brand, concat(t3.regis_id,' - ',t3.car_brand) as car, t4.employee_id as employee, t2.pickup_date as date, t5.to_name FROM `ord_productdetail` t1 INNER JOIN ord_product t2 ON t2.product_id = t1.product_id INNER JOIN tb_vehicle t3 ON t3.car_id = t2.car_id INNER JOIN employees t4 ON t4.employee_id = t2.employee_code INNER JOIN tb_order t5 ON t5.order_id = t1.order_id WHERE t3.car_id = ? AND t2.status = ?;",[$request->car_id,1]);
        return [
            "success" => true,
            "data" => $data
        ];
    }

    public function listordproductdetail(){
        $data = DB::select("SELECT t1.*,t2.car_id,t3.regis_id,t3.car_brand, concat(t3.regis_id,' - ',t3.car_brand) as car, t4.employee_id as employee, t2.pickup_date as date, t5.to_name FROM `ord_productdetail` t1 INNER JOIN ord_product t2 ON t2.product_id = t1.product_id INNER JOIN tb_vehicle t3 ON t3.car_id = t2.car_id INNER JOIN employees t4 ON t4.employee_id = t2.employee_code INNER JOIN tb_order t5 ON t5.order_id = t1.order_id WHERE t1.status = ?;",[1]);
        return [
            "success" => true,
            "data" => $data
        ];
    }

    public function listOrderProduct(){
        $data = DB::select("SELECT t1.product_id,t3.value_lookup as car_type,t2.regis_id, concat(t5.name,' ',t5.lastname) as fullname, CONCAT( DATE_FORMAT( t1.pickup_date , '%d' ), '/', DATE_FORMAT( t1.pickup_date , '%m' ) ,'/', DATE_FORMAT( t1.pickup_date , '%Y' ) ) AS pickup_date,t1.created_by, t4.value_lookup as on_status,t1.on_status as on_status_code FROM `ord_product` t1 INNER JOIN tb_vehicle t2 ON t2.car_id = t1.car_id INNER JOIN tb_lookup t3 ON t3.code_lookup = t2.isTrucktype AND t3.name_lookup = 'vehicletype' INNER JOIN tb_lookup t4 ON t4.code_lookup = t1.on_status AND t4.name_lookup = 'order_product' INNER JOIN employees t5 ON t5.employee_id = t1.employee_code WHERE t1.status = ?;",[1]);
        return [
            "success" => true,
            "data" => $data
        ];
    }

    public function updateStatusProduct(Request $request){
        $model = OrderProduct::where('product_id',$request->product_id)->firstOrFail();
        $model->on_status = '02';
        if($model->save()){

            $data = DB::select("SELECT order_id FROM ord_productdetail WHERE product_id = ? GROUP BY order_id;",[$request->product_id]);
            foreach ($data as $item) {
                $state = new States();
                $state->systemcode = $request->product_id;
                $state->ord_vehicle = $item->order_id;
                $state->prev_state = "01";
                $state->current_state = "02";
                $state->created_by = $request->by;
                $state->formdata = "";
                $state->updated_by = $request->by;
                $state->save();
            }

            return [
                'success' => true,
                'message' => 'updated successfully'
            ];
        }else{
            return [
                'success' => false,
                'message' => 'updated unsuccessfully'
            ];
        }
    }

    public function progressListExpense($employee_id){
        $str = "";
        if($employee_id != "admin"){
            $str = "AND t2.employee_id = ?;";
        }
        $data = DB::select("SELECT t1.product_id,concat(t2.name,' ',t2.lastname) as fullname,t2.phone,t3.regis_id,t4.value_lookup as cartype, CONCAT( DATE_FORMAT( t1.pickup_date , '%d' ), '/', DATE_FORMAT( t1.pickup_date , '%m' ) ,'/', DATE_FORMAT( t1.pickup_date , '%Y' ) ) AS pickup_date, t5.value_lookup as status, t2.employee_id FROM `ord_product` t1 LEFT JOIN employees t2 on t2.employee_id = t1.employee_code LEFT JOIN tb_vehicle t3 on t3.car_id = t1.car_id LEFT JOIN tb_lookup t4 on t4.code_lookup = t3.cartype and t4.name_lookup = 'vehicletype' LEFT JOIN tb_lookup t5 on t5.code_lookup = t1.on_status and t5.name_lookup = 'order_product' WHERE t1.status = ? AND t1.on_status = ? ".$str,[1,"03",$employee_id]);
        return [
            "success" => true,
            "data" => $data
        ];
    }

    public function progressGetExpense($product_id){
        $data = DB::select("SELECT t2.value_lookup as paytype, t1.amount, t1.remark, t3.base64 FROM tb_expent t1 LEFT JOIN tb_lookup t2 ON t2.code_lookup = t1.expent_type and t2.name_lookup = 'paytype' LEFT JOIN tb_image t3 ON t3.type_image = concat('image_',t1.expent_type,'_',t1.amount,'_',t1.remark) WHERE t1.product_id = ? AND t3.status = ?;",[$product_id,1]);
        return [
            "success" => true,
            "data" => $data
        ];
    }

    public function progressGetOrder($product_id){
        $data = DB::select("SELECT t1.product_id,t2.order_id,t2.po,t3.customer_name,t2.to_name,t1.ismainorder,t4.current_state FROM ord_productdetail t1 LEFT JOIN tb_order t2 ON t2.order_id = t1.order_id LEFT JOIN tb_customer t3 ON t3.customer_id = t2.cust_code LEFT JOIN (SELECT ord_vehicle, max(current_state) as current_state FROM states GROUP BY ord_vehicle) t4 ON t4.ord_vehicle = t2.order_id WHERE t4.current_state >= '03' AND t1.product_id = ?;",[$product_id]);
        return [
            "success" => true,
            "data" => $data
        ];
    }

    public function updateStatus(Request $request){

        $track_now = $request->track_now;
        $track_update = $request->track_update;
        $signature = $request->signature;
        $order_id = $request->order_id;
        $product_id = $request->product_id;
        $description = $request->description;
        $image = $request->image;
        $by = $request->by;

        if($image != ""){
            $image1 = new Image();
            $image1->product_id = $product_id;
            $image1->image = "";
            $image1->base64 = $image;
            $image1->path = "";
            $image1->type_image = "image".$product_id.$order_id.$track_update;
            $image1->created_by = $by;
            $image1->updated_by = "";
            $image1->status = 1;
            $image1->save();
        }

        if($signature != ""){
            $image2 = new Image();
            $image2->product_id = $product_id;
            $image2->image = "";
            $image2->base64 = $signature;
            $image2->path = "";
            $image2->type_image = "signature".$product_id.$order_id.$track_update;
            $image2->created_by = $by;
            $image2->updated_by = "";
            $image2->status = 1;
            $image2->save();
        }

        $state = new States();
        $state->systemcode = $product_id;
        $state->ord_vehicle = $order_id;
        $state->prev_state = $track_now;
        $state->current_state = $track_update;
        $state->created_by = $by;
        $state->formdata = "";
        $state->description = $description;
        $state->updated_by = $by;
        if($state->save()){
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

    public function headupdatestatus(Request $request){
        $order_id = $request->order_id;
        $product_id = $request->product_id;
        $by = $request->by;
        $state = new States();
        $state->systemcode = $product_id;
        $state->ord_vehicle = $order_id;
        $state->prev_state = "08";
        $state->current_state = "09";
        $state->created_by = $by;
        $state->formdata = "";
        $state->description = "";
        $state->updated_by = $by;
        if($state->save()){
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

    public function close(Request $request){
        $product_id = $request->product_id;
        $order_id = $request->order_id;
        $by = $request->by;

        $data = DB::select("SELECT * FROM ord_productdetail WHERE product_id = ?;",[$product_id]);
        foreach ($data as $item) {
            $state = new States();
            $state->systemcode = $product_id;
            $state->ord_vehicle = $item->order_id;
            $state->prev_state = "09";
            $state->current_state = "10";
            $state->created_by = $by;
            $state->formdata = "";
            $state->updated_by = $by;
            $state->save();

            DB::select('UPDATE tb_order SET status = 0 WHERE order_id = ?',[$item->order_id]);
        }

        // $data = OrderProduct::where("product_id",$product_id)->findOrFail();
        // $data->status = 0;
        // $data2 = OrderProductDetail::where('product_id',$product_id)->findOrFail();
        // $data2->status = 0;
        $data1 = DB::select('UPDATE ord_product SET status = 0 WHERE product_id = ?',[$product_id]);
        $data2 = DB::select('UPDATE ord_productdetail SET status = 0 WHERE product_id = ?',[$product_id]);
        // if($data1 && $data2){
            return [
                "success" => true,
                "message" => "updated successfully"
            ];
        // }else{
        //     return [
        //         "success" => false,
        //         "message" => "updated unsuccessfully"
        //     ];
        // }
    }

    public function listheadproduct(){

        $data = DB::select("SELECT DISTINCT t1.product_id,concat(t6.name,' ',t6.lastname) as fullname,t6.phone as to_phone,t5.regis_id,t7.value_lookup as cartype, CONCAT( DATE_FORMAT( t2.pickup_date , '%d' ), '/', DATE_FORMAT( t2.pickup_date , '%m' ) ,'/', DATE_FORMAT( t2.pickup_date , '%Y' ) ) AS pickup_date FROM ord_productdetail t1 INNER JOIN ord_product t2 ON t2.product_id = t1.product_id and t2.status = 1 INNER JOIN (SELECT ord_vehicle,MAX(current_state) as current_state FROM states WHERE current_state = '08' GROUP BY ord_vehicle) t3 on t3.ord_vehicle = t1.order_id INNER JOIN tb_order t4 on t4.order_id = t1.order_id INNER JOIN tb_vehicle t5 on t5.car_id = t2.car_id INNER JOIN employees t6 on t6.employee_id = t2.employee_code LEFT JOIN tb_lookup t7 on t7.code_lookup = t5.cartype and t7.name_lookup = 'vehicletype';");

        return [
            "success" => true,
            "message" => "updated successfully",
            "data" => $data
        ];
    }

    public function listheadorder($product_id){

        $data = DB::select("SELECT t2.order_id,t3.po,t4.customer_name,t3.to_name,t2.ismainorder,t3.current_state FROM ord_product t1 INNER JOIN ord_productdetail t2 on t2.product_id = t1.product_id INNER JOIN (SELECT ord_vehicle,max(current_state) as current_state FROM states WHERE current_state GROUP BY ord_vehicle) t3 on t3.ord_vehicle = t2.order_id INNER JOIN tb_order t3 on t3.order_id = t2.order_id INNER JOIN tb_customer t4 on t4.customer_id = t3.cust_code WHERE t1.product_id = ?;",[$product_id]);

        return [
            "success" => true,
            "message" => "updated successfully",
            "data" => $data
        ];
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
