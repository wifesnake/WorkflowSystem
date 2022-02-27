<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostVehicleResource;
use App\Models\Vehicle;
use App\Models\Runorderno;
use Illuminate\Support\Facades\DB;

class PostVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function car(){
        $data = DB::select('SELECT id, car_id,regis_id,car_brand FROM tb_vehicle WHERE status = ? AND car_id NOT IN (SELECT DISTINCT car_id FROM tb_employee_car);',[1]);
        return ["data"=>$data];
    }

    public function cars(){
        $data = DB::select('SELECT id, car_id,regis_id,car_brand FROM tb_vehicle WHERE status = ?;',[1]);
        return ["data"=>$data];
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
        $post = new Vehicle();
        $post->car_id = $request->car_id;
        $post->regis_id = $request->regis_id;
        $post->car_brand = $request->car_brand;
        $post->isTrucktype = $request->isTrucktype;
        $post->cartype = $request->cartype;
        $post->car_location = $request->car_location;
        $post->status = 1;
        $post->created_by = $request->created_by;
        $post->updated_by = $request->updated_by;
        if($post->save())
        {

            $t = $request->car_id;
            $t = str_replace("V","",$t);
            $t = (int)$t +1;
            $runordno = Runorderno::findOrFail(5);
            $runordno->runno = $t;
            $runordno->save();
            return new PostVehicleResource($post);

        }
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
        $post = Vehicle::findOrFail($id);
        return new PostVehicleResource($post);
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
        $post = Vehicle::findOrFail($id);
        $post->car_id = $request->car_id;
        $post->regis_id = $request->regis_id;
        $post->car_brand = $request->car_brand;
        $post->isTrucktype = $request->isTrucktype;
        $post->cartype = $request->cartype;
        $post->car_location = $request->car_location;
        $post->created_by = $request->created_by;
        $post->updated_by = $request->updated_by;
        if($post->save())
        {
            return new PostVehicleResource($post);
        }
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
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->status = 0;
        if($vehicle->save())
        {
            return new PostVehicleResource($vehicle);
        }
    }
}
