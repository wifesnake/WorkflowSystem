<?php

namespace App\Http\Controllers;

use App\Http\Resources\FlowResource;
use App\Http\Resources\StatesResource;
use App\Models\DataModel;
use App\Models\Flow;
use App\Models\Order;
use App\Models\Runorderno;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$flows = DB::select('select distinct t1.ord_vehicle,t2.id,t5.po,t6.customer_name,t5.to_name,t5.product_type,t5.product_desc,t5.m_unit,t5.L_unit,t5.weight,t1.status,t2.prev_state,t3.from_state as current_state, t3.to_state as next_state,t4.name as state_name,t1.updated_by,t2.created_at, CONVERT_TZ(t2.created_at,"+00:00","+07:00") as datetime_th from flows t1 inner join (select * from states where id in (select max(id) from states group by ord_vehicle)) t2 on t2.ord_vehicle = t1.ord_vehicle inner join tb_state_action t3 on t3.from_state = t2.current_state and t3.to_state <> "99" inner join tb_states t4 on t4.id_state = t3.from_state inner join tb_order t5 ON t5.order_id = t1.ord_vehicle inner join tb_customer t6 ON t6.customer_id = t5.cust_code inner join tb_rolestate t7 on t7.state_id = t4.id_state and t7.role_id = ? where t1.status = ? AND t3.from_state in (\'00\') ORDER BY t2.updated_at;',[$request->role,1]); */
        $flows = DB::select('select t1.order_id ord_vehicle, t1.po po, t2.customer_name customer_name, t1.to_name to_name, t1.weight weight, \'Request\' state_name, t1.created_at , t3.current_state current_state from tb_order t1 inner join tb_customer t2 on t1.cust_code = t2.customer_id inner join (select ord_vehicle , max(current_state) current_state from states GROUP by ord_vehicle ) t3 on t1.order_id = t3.ord_vehicle inner join flows t4 on t1.order_id = t4.ord_vehicle where t3.current_state = \'00\' and t4.status = ? order by created_at desc;',[1]);
        return ["data" => $flows];
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
     * Show the form for Update Stat.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateStates(Request $request)
    {
        $state = new States();
        $state->systemcode = null;
        $state->ord_vehicle = $request->ord_vehicle;
        $state->prev_state = $request->current_state;
        $state->current_state = $request->to_state;
        $state->formdata = $request->formdata;
        $state->created_by = $request->created_by;
        $state->updated_by = $request->updated_by;
        $json = $request->json;
        if($state->save()){

            $order = Order::where('order_id',$request->ord_vehicle)->firstOrFail();
            $order->order_remark = $json["order_remark"];
            $order->to_name = $json["to_name"];
            $order->to_address = $json["to_address"];
            $order->to_phone = $json["to_phone"];
            $order->product_desc = $json["product_desc"];
            $order->m_unit = $json["m_unit"];
            $order->L_unit = $json["L_unit"];
            $order->product_type = $json["product_type"];
            $order->weight = $json["weight"];
            $order->remark = $json["remark"];
            $order->save();

            $flow = Flow::findOrFail($request->id);
            $flow->prev_state = $request->current_state;
            $flow->current_state = $request->to_state;
            $flow->updated_by = $request->updated_by;
            if($request->current_state == null){
                $flow->status = 0;
            }
            $flow->save();

            return new StatesResource($state);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flow = new Flow();
        $flow->systemcode = null;
        $flow->ord_vehicle = $request->ord_vehicle;
        $flow->prev_state = $request->prev_state;
        $flow->current_state = $request->current_state;
        $flow->status = 1;
        $flow->created_by = $request->updated_by;
        $flow->updated_by = $request->updated_by;
        if($flow->save())
        {
            $t = $request->ord_vehicle;
            $t = str_replace("VE","",$t);
            $t = (int)$t +1;
            $runordno = Runorderno::findOrFail(2);
            $runordno->runno = $t;
            $runordno->save();

            $state = new States();
            $state->systemcode = null;
            $state->ord_vehicle = $request->ord_vehicle;
            $state->prev_state = null;
            $state->current_state = $request->current_state;
            $state->formdata = $request->formdata;
            $state->created_by = $request->updated_by;
            $state->updated_by = $request->updated_by;
            $state->save();

            return new FlowResource($flow);
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
