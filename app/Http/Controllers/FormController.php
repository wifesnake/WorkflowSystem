<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
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
        //dd($leftmenu);

        return view('form',$leftmenu);
    }

    public function detail($id){
        $menu = new DataModel();
        $leftmenu = $menu->getmenu();
        $leftmenu["flowdatas"] = $this->getFlowdata($id);
        //dd($leftmenu);

        return view('form',$leftmenu);
    }

    protected function getFlowdata($id){

        $flows = DB::select("select t1.ord_vehicle,t2.current_state as prev_state,t3.from_state as current_state,t3.to_state as next_state,t4.name as state_name,t3.formname,t1.updated_by from flows t1 left join (select * from states where id in (select max(id) from states group by ord_vehicle)) t2 on t2.ord_vehicle = t1.ord_vehicle left join tb_stateconfig t3 on t3.from_state = t2.next_state left join tb_states t4 on t4.id_state = t3.from_state where t1.ord_vehicle = ? and t1.status = ?;",[$id,1]);

        return $flows;
    }
}
