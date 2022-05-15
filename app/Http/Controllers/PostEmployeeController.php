<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostEmployeeResource;
use App\Models\Employee;
use App\Models\Runorderno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $data = DB::select("SELECT t1.id,concat(t1.name,' ',t1.lastname) as fullname,t1.email,t1.phone,t1.salary,t2.value_lookup as 'employee_type',t3.value_lookup as 'department' FROM employees t1 LEFT JOIN tb_lookup t2 ON t2.code_lookup = t1.employee_type and t2.name_lookup = 'employeetype' LEFT JOIN tb_lookup t3 ON t3.code_lookup = t1.department and t3.name_lookup = 'department' WHERE t1.status = ?",[1]);
        return ["data"=>$data];
    }

    public function driver(){
        $data = DB::select("SELECT id, employee_id, name, lastname, concat(name,' ',lastname) as fullname FROM employees where employee_type in ('002','003') AND employee_id NOT IN (SELECT DISTINCT employee_id FROM tb_employee_car);");
        return ["data"=>$data];
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
        $post->status = 1;
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
        $employee->status = 0;
        if($employee->save())
        {
            return new PostEmployeeResource($employee);
        }
    }
}
