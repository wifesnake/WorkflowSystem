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
        $data = DB::select("SELECT DISTINCT t1.order_id, t1.po,CONCAT( DATE_FORMAT( t5.pickup_date , '%d' ), '/', DATE_FORMAT( t5.pickup_date , '%m' ) ,'/', DATE_FORMAT( t5.pickup_date , '%Y' ) ) as start_date,CONCAT( DATE_FORMAT( t3.created_at , '%d' ), '/', DATE_FORMAT( t3.created_at , '%m' ) ,'/', DATE_FORMAT( t3.created_at , '%Y' )) as end_date, CONCAT( DATE_FORMAT( t7.created_at , '%d' ), '/', DATE_FORMAT( t7.created_at , '%m' ) ,'/', DATE_FORMAT( t7.created_at , '%Y' )) as check_doc , t4.customer_name as sender_name, t4.address as sender_address ,t1.to_name as reciever_name, t1.to_address as reciever_address, t1.to_phone as reciever_phone, t1.product_desc, t1.product_number,t1.weight,t5.driver_name, t5.regis_id,t5.isTrucktype FROM tb_order t1 LEFT JOIN (SELECT ord_vehicle, current_state,created_at FROM states WHERE current_state = '01') t2 ON t2.ord_vehicle = t1.order_id LEFT JOIN (SELECT ord_vehicle, current_state,created_at FROM states WHERE current_state = '07') t3 ON t3.ord_vehicle = t1.order_id LEFT JOIN (SELECT ord_vehicle, current_state,created_at FROM states WHERE current_state = '09') t7 ON t7.ord_vehicle = t1.order_id LEFT JOIN tb_customer t4 ON t4.customer_id = t1.cust_code LEFT JOIN ( SELECT t2.order_id,concat(t3.name,' ',t3.lastname) as driver_name, t4.regis_id, t1.pickup_date, t5.value_lookup as isTrucktype, t6.value_lookup as cartype FROM ord_product t1 LEFT JOIN ord_productdetail t2 ON t2.product_id = t1.product_id LEFT JOIN employees t3 ON t3.employee_id = t1.employee_code LEFT JOIN tb_vehicle t4 ON t4.car_id = t1.car_id LEFT JOIN tb_lookup t5 ON t5.code_lookup = t4.isTrucktype and t5.name_lookup = 'vehicletype' LEFT JOIN tb_lookup t6 ON t6.code_lookup = t4.cartype and t6.name_lookup = 'usevehicle') t5 ON t5.order_id = t1.order_id;"); 
        return ["data" => $data];
    }

    //, ' ', DATE_FORMAT( t6.created_at , '%T' ) 
    public function reportExspense(){
        $data = DB::select("SELECT DISTINCT t1.product_id, t3.amount as receive_amount,t4.amount as pay_amount, concat(t5.name,' ',t5.lastname) as driver_name ,CONCAT( DATE_FORMAT( t1.pickup_date , '%d' ), '/', DATE_FORMAT( t1.pickup_date , '%m' ) ,'/', DATE_FORMAT( t1.pickup_date , '%Y' ) ) as start_date, IF(isnull(t6.created_at)=1,'-',CONCAT( DATE_FORMAT( t6.created_at , '%d' ), '/', DATE_FORMAT( t6.created_at , '%m' ) ,'/', DATE_FORMAT( t6.created_at , '%Y' ))) as end_date FROM ord_product t1 INNER JOIN ord_productdetail t2 ON t2.product_id = t1.product_id LEFT JOIN ( SELECT t1.product_id, sum(t1.amount) as amount,t1.expent_type as expent_type_code, IF(t1.expent_type = '001','รายรับ','รายจ่าย') as expent_type FROM tb_expent t1 WHERE t1.expent_type = '001' GROUP BY t1.product_id,t1.expent_type) t3 ON t3.product_id = t1.product_id LEFT JOIN (SELECT t1.product_id, sum(t1.amount) as amount,t1.expent_type as expent_type_code, IF(t1.expent_type = '001','รายรับ','รายจ่าย') as expent_type FROM tb_expent t1 WHERE t1.expent_type = '002' GROUP BY product_id,t1.expent_type) t4 ON t4.product_id = t1.product_id INNER JOIN employees t5 ON t5.employee_id = t1.employee_code LEFT JOIN (SELECT ord_vehicle, current_state,created_at, concat(systemcode,'TH') as systemcode FROM states WHERE current_state = '10') t6 ON t6.systemcode = t1.product_id;");
        return ["data" => $data];
    }

    public function reportAgency(Request $request){
        $query = "";
        if($request->date != ""){
            $query = " WHERE CONCAT( DATE_FORMAT( pickup_date , '%Y' ) ,'-', DATE_FORMAT( pickup_date , '%m' )) = '".$request->date."'";
        }
        $data = DB::select("SELECT ROW_NUMBER() OVER (ORDER BY t1.pickup_date) row_num, CONCAT( DATE_FORMAT( t1.pickup_date , '%d' ), '/', DATE_FORMAT( t1.pickup_date , '%m' ) ,'/', DATE_FORMAT( t1.pickup_date , '%Y' )) as pickup_date,t4.customer_name,CONCAT(t6.name,' ',t6.lastname) as driver,t5.regis_id as car_sign, t7.value_lookup as car_type,t3.po,t3.order_id,t3.to_name,t3.to_address,t3.product_number,CONCAT( DATE_FORMAT( t8.created_at , '%d' ), '/', DATE_FORMAT( t8.created_at , '%m' ) ,'/', DATE_FORMAT( t8.created_at , '%Y' )) as date_received,CONCAT('') as clear_bill,t1.product_id,IF(ISNULL(t9.amount)>0,0,t9.amount) as income,IF(ISNULL(t10.amount)>0,0,t10.amount) as payment FROM `ord_product` t1 LEFT JOIN ord_productdetail t2 on t2.product_id = t1.product_id LEFT JOIN tb_order t3 on t3.order_id = t2.order_id LEFT JOIN tb_customer t4 on t4.customer_id = t3.cust_code LEFT JOIN tb_vehicle t5 on t5.car_id = t1.car_id LEFT JOIN employees t6 on t6.employee_id = t1.employee_code LEFT JOIN tb_lookup t7 on t7.code_lookup = t5.isTrucktype AND t7.name_lookup = 'vehicletype' LEFT JOIN (SELECT ord_vehicle, current_state,created_at FROM states WHERE current_state = '07') t8 on t8.ord_vehicle = t3.order_id LEFT JOIN (SELECT product_id, expent_type, SUM(amount) as amount FROM `tb_expent` WHERE expent_type = '001' GROUP BY product_id, expent_type) t9 on t9.product_id = t1.product_id LEFT JOIN (SELECT product_id, expent_type, SUM(amount) as amount FROM `tb_expent` WHERE expent_type = '002' GROUP BY product_id, expent_type) t10 on t10.product_id = t1.product_id".$query." ORDER BY t1.pickup_date DESC;");
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
