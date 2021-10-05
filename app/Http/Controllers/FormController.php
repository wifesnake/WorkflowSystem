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
        $leftmenu["formnames"] = $this->getFormDependency($id);
        $leftmenu["btnactions"] = $this->BtnAction(($id));
        // dd($leftmenu);

        return view('form',$leftmenu);
    }

    protected function getFlowdata($id){

        $flows = DB::select("select distinct t1.ord_vehicle,t2.prev_state,t3.from_state as current_state,t3.to_state as next_state,t4.name as state_name,t1.updated_by from flows t1 left join (select * from states where id in (select max(id) from states group by ord_vehicle)) t2 on t2.ord_vehicle = t1.ord_vehicle left join tb_state_action t3 on t3.from_state = t2.current_state left join tb_states t4 on t4.id_state = t3.to_state where t1.ord_vehicle = ? and t1.status = ?;",[$id,1]);

        return $flows;
    }

    protected function getFormDependency($id){

        $forms = DB::select("select t4.formname from flows t1 inner join (select * from states where id in (select max(id) from states group by ord_vehicle)) t2 on t2.ord_vehicle = t1.ord_vehicle inner join tb_state_action t3 on t3.from_state = t2.current_state inner join tb_stateconfig t4 on t4.from_state = t3.to_state where t1.ord_vehicle = ? and t1.status = ?;",[$id,1]);

        return $forms;
    }

    protected function BtnAction($id){
        $btn = DB::select("SELECT DISTINCT t1.id, t2.prev_state, isnull(t2.prev_state) as isPrevstate, t2.current_state, isnull(t2.current_state) as isCurrentstate, t3.to_state, isnull(t3.to_state) as isTostate, t1.ord_vehicle FROM `flows` t1 INNER JOIN (SELECT * FROM states WHERE id IN (SELECT max(id) from states GROUP BY ord_vehicle)) t2 on t2.ord_vehicle = t1.ord_vehicle INNER JOIN tb_state_action t3 on t3.from_state = t2.current_State WHERE t1.ord_vehicle = ?;", [$id]);
        return $btn;
    }
}
