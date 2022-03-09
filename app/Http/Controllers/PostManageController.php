<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeCarResource;
use App\Models\CarOrder;
use App\Models\EmployeeCar;
use App\Models\OrderProduct;
use App\Models\OrderProductDetail;
use App\Models\Runorderno;
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
        $data = DB::select('SELECT * FROM tb_employee_car t1 LEFT JOIN employees t2 ON t2.employee_id = t1.employee_id LEFT JOIN tb_vehicle t3 ON t3.car_id = t1.car_id;');
        return ["data"=>$data];
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
                    $model = new OrderProduct();
                    $model->product_id = ($product_ids[$i]) ? $product_ids[$i] : $product_no ;
                    $model->car_id = $car[$i];
                    $model->employee_code = $employee[$i];
                    $model->pickup_date = $date[$i];
                    $model->created_by = $by[$i];
                    $model->updated_by = "";
                    $model->save();
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
        $data = DB::select("SELECT t1.*,t2.car_id,t3.regis_id,t3.car_brand, concat(t3.regis_id,' - ',t3.car_brand) as car, t4.employee_id as employee, t2.pickup_date as date, t5.to_name FROM `ord_productdetail` t1 INNER JOIN ord_product t2 ON t2.product_id = t1.product_id INNER JOIN tb_vehicle t3 ON t3.car_id = t2.car_id INNER JOIN employees t4 ON t4.employee_id = t2.employee_code INNER JOIN tb_order t5 ON t5.order_id = t1.order_id WHERE t3.car_id = ? AND t1.status = ?;",[$request->car_id,1]);
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
        $data = DB::select("SELECT t1.product_id,t3.value_lookup as car_type,t2.regis_id, concat(t5.name,' ',t5.lastname) as fullname, CONCAT( DATE_FORMAT( t1.pickup_date , '%d' ), '/', DATE_FORMAT( t1.pickup_date , '%m' ) ,'/', DATE_FORMAT( t1.pickup_date , '%Y' ) ) AS pickup_date,t1.created_by, t4.value_lookup as on_status FROM `ord_product` t1 INNER JOIN tb_vehicle t2 ON t2.car_id = t1.car_id INNER JOIN tb_lookup t3 ON t3.code_lookup = t2.isTrucktype AND t3.name_lookup = 'vehicletype' INNER JOIN tb_lookup t4 ON t4.code_lookup = t1.on_status AND t4.name_lookup = 'order_product' INNER JOIN employees t5 ON t5.employee_id = t1.employee_code WHERE t1.status = ?;",[1]);
        return [
            "success" => true,
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
