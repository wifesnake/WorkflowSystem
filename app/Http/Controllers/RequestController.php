<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu = new DataModel();
        $leftmenu = $menu->getmenu();
        $leftmenu["ordno"] = $this->GetLastOrder();
        $leftmenu["formnames"] = $this->getFormDependency();
        //dd($leftmenu);

        return view('request',$leftmenu);
    }

    public function GetLastOrder(){
        $runno = DB::select("select lpad(lpad(runno,6,'0'),8,'VE') as runno FROM tb_runorderno WHERE status = ? and istype='ordervehicle' limit 1",['1']);

        $isRunno = "";
        foreach ($runno as $key => $value) {
            foreach($value as $key2 => $value2){
                $isRunno = $value2;
            }
        }

        return $isRunno;
    }

    protected function getFormDependency(){

        $forms = DB::select("select formname from tb_stateconfig where from_state = '00';");

        return $forms;
    }
}
