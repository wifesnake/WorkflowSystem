<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostReportController extends Controller
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

    public function reportOrder(){
        $data = DB::select("SELECT t1.order_id,CONCAT( DATE_FORMAT( t2.created_at , '%d' ), '/', DATE_FORMAT( t2.created_at , '%m' ) ,'/', DATE_FORMAT( t2.created_at , '%Y' ), ' ', DATE_FORMAT( t2.created_at , '%T' ) ) as start_date,CONCAT( DATE_FORMAT( t3.created_at , '%d' ), '/', DATE_FORMAT( t3.created_at , '%m' ) ,'/', DATE_FORMAT( t3.created_at , '%Y' ), ' ', DATE_FORMAT( t3.created_at , '%T' ) ) as end_date,t4.customer_name as sender_name, t4.address as sender_address, t1.to_name as reciever_name, t1.to_address as reciever_address,t1.product_desc,t5.driver_name, t5.regis_id FROM tb_order t1 LEFT JOIN (SELECT ord_vehicle, current_state,created_at FROM states WHERE current_state = '01') t2 ON t2.ord_vehicle = t1.order_id LEFT JOIN (SELECT ord_vehicle, current_state,created_at FROM states WHERE current_state = '10') t3 ON t3.ord_vehicle = t1.order_id LEFT JOIN tb_customer t4 ON t4.customer_id = t1.cust_code LEFT JOIN ( SELECT t2.order_id,concat(t3.name,' ',t3.lastname) as driver_name, t4.regis_id FROM ord_product t1 INNER JOIN ord_productdetail t2 ON t2.product_id = t1.product_id INNER JOIN employees t3 ON t3.employee_id = t1.employee_code INNER JOIN tb_vehicle t4 ON t4.car_id = t1.car_id ) t5 ON t5.order_id = t1.order_id;");
        return ["data" => $data];
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
