<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeCarResource;
use App\Models\CarOrder;
use App\Models\EmployeeCar;
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
        $by = $request->by;
        $car = explode(",",$request->car);
        $order = explode(",",$request->order);
        $deleted = CarOrder::where('car_id',$car[0])
                            ->where('status',1)
                            ->delete();
        for($i=0;$i<count($car);$i++){
            $model = new CarOrder();
            $model->car_id = $car[$i];
            $model->order_id = $order[$i];
            $model->created_by = $by;
            $model->updated_by = $by;
            $model->status = 1;
            $model->save();
        }
        return [
            "success" => true,
            "message" => "created successfully",
            "deleted" => $deleted
        ];
    }

    public function listcarorder(Request $request){
        $data = DB::select('SELECT t1.*,t2.regis_id,t2.car_brand,t3.to_name FROM `tb_car_order` t1 INNER JOIN tb_vehicle t2 ON t2.car_id = t1.car_id INNER JOIN tb_order t3 ON t3.order_id = t1.order_id WHERE t1.car_id = ? AND t1.status = ?;',[$request->car_id,1]);
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
