<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostRequestResource;
use App\Models\Flow;
use App\Models\Order;
use App\Models\Runorderno;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostRequestController extends Controller
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
        $post = new Order();
        $post->order_id = $request->order_id;
        $post->po = $request->po;
        $post->cust_code = $request->cust_code;
        $post->to_name = $request->to_name;
        $post->to_address = $request->to_address;
        $post->to_phone = $request->to_phone;
        $post->product_type = $request->product_type;
        $post->product_desc = $request->product_desc;
        $post->m_unit = $request->m_unit;
        $post->L_unit = $request->L_unit;
        $post->weight = $request->weight;
        $post->remark = $request->remark;
        $post->order_remark = $request->order_remark;
        $post->requesr_car_type = $request->car_type;
        $post->created_by = $request->updated_by;
        $post->updated_by = $request->updated_by;
        if($post->save()){

            $q = DB::select('select runno from tb_runorderno where istype = "ordervehicle"');
            $no = 0;
            foreach ($q as $item) {
                $no = $item->runno;
            }
            $no = (int)$no +1;
            $runordno = Runorderno::findOrFail(2);
            $runordno->runno = $no;
            $runordno->save();

            $state = new States();
            $state->systemcode = null;
            $state->ord_vehicle = $request->order_id;
            $state->prev_state = null;
            $state->current_state = "00";
            $state->formdata = $request->base64;
            $state->created_by = $request->updated_by;
            $state->updated_by = $request->updated_by;
            $state->save();

            $flow = new Flow();
            $flow->systemcode = null;
            $flow->ord_vehicle = $request->order_id;
            $flow->prev_state = null;
            $flow->current_state = "00";
            $flow->status = 1;
            $flow->created_by = $request->updated_by;
            $flow->updated_by = $request->updated_by;
            $flow->save();

            return new PostRequestResource($post);

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
        $q = DB::select("SELECT * FROM `tb_customer` where customer_id = ?",[$id]);

        return new PostRequestResource($q);
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
