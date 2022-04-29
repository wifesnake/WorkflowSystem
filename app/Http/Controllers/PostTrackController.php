<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostTrackController extends Controller
{

    public function get($ord_vehicle){
        $data = DB::select("SELECT tc.customer_name , tc.address , od.to_name , od.to_address , st.ord_vehicle, od.po , st.prev_state, st.current_state, st.created_by,st.created_at , st.description , st.remark FROM `states`  st left join `tb_order` od on st.ord_vehicle = od.order_id left join tb_customer tc on od.cust_code = tc.customer_id where st.ord_vehicle = ? or od.po = ?  order by st.created_at DESC;",[$ord_vehicle , $ord_vehicle]);

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
