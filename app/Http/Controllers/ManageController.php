<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class ManageController extends Controller
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

    public function index(){
        $menu = new DataModel();
        $leftmenu = $menu->getmenu();
        return view('manage',$leftmenu);
    }

    public function car(){
        $menu = new DataModel();
        $leftmenu = $menu->getmenu();
        return view('managecar',$leftmenu);
    }

    public function headupdate(){
        $menu = new DataModel();
        $leftmenu = $menu->getmenu();
        return view('headupdatestatus',$leftmenu);
    }

    public function employeecar(){
        $menu = new DataModel();
        $leftmenu = $menu->getmenu();
        return view('managedriver',$leftmenu);
    }
}
