<?php

namespace App\Http\Controllers;

use App\Http\Resources\FlowResource;
use App\Http\Resources\StatesResource;
use App\Models\DataModel;
use App\Models\Flow;
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
    public function index()
    {
        // $menu = new DataModel();
        // $leftmenu = $menu->getmenu();
        // //dd($leftmenu);

        // return view('flows',$leftmenu);

        //$flows = Flow::where('status','=',1)->paginate(10);
        //return FlowResource::collection($flows);

        $flows = DB::select('select distinct t2.id,t1.ord_vehicle,t5.po,t6.customer_name,t5.to_name,t5.product_type,t5.unit,t5.weight,t1.status,t2.prev_state,t3.from_state as current_state, t3.to_state as next_state,t4.name as state_name,t1.updated_by,t2.created_at, CONVERT_TZ(t2.created_at,"+00:00","+07:00") as datetime_th from flows t1 inner join (select * from states where id in (select max(id) from states group by ord_vehicle)) t2 on t2.ord_vehicle = t1.ord_vehicle inner join tb_state_action t3 on t3.from_state = t2.current_state inner join tb_states t4 on t4.id_state = t3.to_state inner join tb_order t5 ON t5.order_id = t1.ord_vehicle inner join tb_customer t6 ON t6.customer_id = t5.cust_code where t1.status = ? ORDER BY t2.created_at desc',[1]);
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
        $tmp_prevstate = $request->current_state == "00" || $request->current_state == "" ? null : $request->prev_state;
        $state = new States();
        $state->systemcode = null;
        $state->ord_vehicle = $request->ord_vehicle;
        $state->prev_state = $tmp_prevstate;
        $state->current_state = $request->current_state;
        $state->formdata = $request->formdata;
        $state->created_by = $request->created_by;
        $state->updated_by = $request->updated_by;
        if($state->save()){

            $flow = Flow::findOrFail($request->id);
            $flow->prev_state = $tmp_prevstate;
            $flow->current_state = $request->current_state;
            $flow->updated_by = $request->updated_by;
            if($tmp_prevstate == null){
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
