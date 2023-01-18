<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Row;

class PostTrackController extends Controller
{

    public function get($ord_vehicle){

        $data2 = DB::select("select order_id from tb_order where po = ? or order_id = ?" ,[$ord_vehicle , $ord_vehicle]);

        $sNewOrd_vehicle = "";
        if(count($data2) > 0){
            $ArreyData = $data2[0];
            $sNewOrd_vehicle = $ArreyData -> order_id;
        }
        
        $data = DB::select("SELECT tc.customer_name , tc.address , od.to_name , od.to_address , st.ord_vehicle, od.po , st.prev_state, st.current_state, st.created_by,st.created_at , st.description , st.remark , ti.base64 FROM (select * from tb_order where po = ? or order_id = ?) od left join (select * from states where  ord_vehicle =  ? and current_state in ('00','01','02','03','04','05','06','07') )  st on st.ord_vehicle = od.order_id left join tb_customer tc on od.cust_code = tc.customer_id left join tb_image ti on st.ord_vehicle = SUBSTRING(ti.type_image, 22, 12) and SUBSTRING(ti.type_image, 34, 2) = st.current_state order by st.created_at DESC;",[$sNewOrd_vehicle , $sNewOrd_vehicle , $sNewOrd_vehicle]);

        return [
            "success" => true,
            "data" => $data
        ];
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
