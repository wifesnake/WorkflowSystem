<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostEmployeeResource;
use App\Models\Employee;
use App\Models\Runorderno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostEmployeeController extends Controller
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
        $post = new Employee();
        $post->titlename = $request->titlename;
        $post->name = $request->name;
        $post->lastname = $request->lastname;
        $post->address = $request->address;
        $post->id_card = $request->id_card;
        $post->employee_id = $request->employee_id;
        $post->employee_type = $request->employee_type;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->salary = $request->salary;
        $post->department = $request->department;
        $post->created_by = $request->created_by;
        $post->updated_by = $request->updated_by;
        if($post->save())
        {

            $t = $request->employee_id;
            $t = (int)$t +1;
            $runordno = Runorderno::findOrFail(3);
            $runordno->runno = $t;
            $runordno->save();

            User::create([
                'name' => $request->employee_id,
                'email' => $request->email,
                'password' => Hash::make($request->id_card),
                'is_admin' => '0'
            ]);

            return new PostEmployeeResource($post);
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
        $post = Employee::findOrFail($id);
        return new PostEmployeeResource($post);
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
        $post = Employee::findOrFail($id);
        $post->titlename = $request->titlename;
        $post->name = $request->name;
        $post->lastname = $request->lastname;
        $post->address = $request->address;
        $post->id_card = $request->id_card;
        $post->employee_id = $request->employee_id;
        $post->employee_type = $request->employee_type;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->salary = $request->salary;
        $post->department = $request->department;
        $post->created_by = $request->created_by;
        $post->updated_by = $request->updated_by;
        if($post->save())
        {
            return new PostEmployeeResource($post);
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
        $employee = Employee::findOrFail($id);
        if($employee->delete())
        {
            return new PostEmployeeResource($employee);
        }
    }
}
