<?php

namespace App\Http\Controllers;

use App\Http\Resources\FlowResource;
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

        $flows = DB::select('select t1.ord_vehicle,t2.current_state as prev_state,t3.from_state as current_state,t3.to_state as next_state,t4.name as state_name,t3.formname,t1.updated_by,t1.created_at from flows t1 left join (select * from states where id in (select max(id) from states group by ord_vehicle)) t2 on t2.ord_vehicle = t1.ord_vehicle left join tb_stateconfig t3 on t3.from_state = t2.next_state left join tb_states t4 on t4.id_state = t3.from_state where t1.status = ? ORDER BY t1.created_at desc;',[1]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flow = new Flow();
        $flow->ord_vehicle = $request->ord_vehicle;
        $flow->prev_state = $request->prev_state;
        $flow->current_state = $request->current_state;
        $flow->next_state = $request->next_state;
        $flow->formdata = $request->formdata;
        $flow->status = 1;
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
            $state->ord_vehicle = $request->ord_vehicle;
            $state->prev_state = $request->prev_state;
            $state->current_state = $request->current_state;
            $state->next_state = $request->next_state;
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
