<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeCarResource;
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
