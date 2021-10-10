<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\Runorderno;
use Illuminate\Http\Request;

class PostCustomerController extends Controller
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
        $post = new Customer();
        $post->customer_id = $request->customer_id;
        $post->customer_name = $request->customer_name;
        $post->address = $request->address;
        $post->phone = $request->phone;
        $post->customer_person_number = $request->customer_person_number;
        $post->created_by = $request->created_by;
        $post->updated_by = $request->updated_by;
        if($post->save()){

            $t = $request->customer_id;
            $t = str_replace("CM","",$t);
            $t = (int)$t +1;
            $runordno = Runorderno::findOrFail(4);
            $runordno->runno = $t;
            $runordno->save();

            return new CustomerResource($post);
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
        $post = Customer::findOrFail($id);
        return new CustomerResource($post);
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
        $post = Customer::findOrFail($id);
        $post->customer_id = $request->customer_id;
        $post->customer_name = $request->customer_name;
        $post->address = $request->address;
        $post->phone = $request->phone;
        $post->customer_person_number = $request->customer_person_number;
        $post->created_by = $request->created_by;
        $post->updated_by = $request->updated_by;
        if($post->save()){
            return new CustomerResource($post);
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
        $delete = Customer::findOrFail($id);
        $delete->status = 0;
        if($delete->save())
        {
            return new CustomerResource($delete);
        }
    }
}
