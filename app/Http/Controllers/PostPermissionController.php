<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rolemenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostPermissionController extends Controller
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

    public function listMenu(){
        $listmenu = DB::select('select * from tb_menu where status = 1;');
        return ["data" => $listmenu];
    }

    public function permisison($id){
        $permission = DB::select('select * from tb_rolemenu where roleid = ?;',[$id]);
        return ["data" => $permission];
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
        $deleted = Rolemenu::where('roleid', $id)->delete();
        $by = $request->by;
        $role = explode(",",$request->role);
        foreach($role as $value){
            $checker = Rolemenu::select('id')
                ->where('roleid',$id)
                ->where('menuid',$value)
                ->exists();
            if(!$checker){
                $rolemenu = new Rolemenu();
                $rolemenu->roleid = $id;
                $rolemenu->menuid = $value;
                $rolemenu->created_by = $by;
                $rolemenu->updated_by = $by;
                $rolemenu->save();
            }
        }

        return [
            "success" => true,
            "message" => "updated successfully",
            "deleted" => $deleted
        ];
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
