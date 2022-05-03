<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostOrderController extends Controller
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

    public function listOrder(){
        $data = DB::select("select DISTINCT order_id, to_name from tb_order WHERE status = ?;",[1]);
        return ['data' => $data];
    }

    public function getListOrder(Request $request){
        $data = DB::select("SELECT t1.*,t2.*,t3.code_lookup as product_code,t3.value_lookup as product_name,t4.code_lookup as car_code,t4.value_lookup as car_name FROM `tb_order` t1 LEFT JOIN tb_customer t2 ON t2.customer_id = t1.cust_code LEFT JOIN tb_lookup t3 ON t3.code_lookup = t1.product_type AND t3.name_lookup = 'product_type' LEFT JOIN tb_lookup t4 ON t4.code_lookup = t1.requesr_car_type AND t4.name_lookup = 'usevehicle' where t1.order_id = ?",[$request->order_id]);
        return ['data' => $data];
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
