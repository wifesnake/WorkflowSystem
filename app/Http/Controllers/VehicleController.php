<?php

namespace App\Http\Controllers;

use App\DataTables\VehicleDataTable;
use App\Http\Controllers\Controller;
use App\Models\DataModel;
use Illuminate\Http\Request;

class VehicleController extends Controller
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
    
    public function index(VehicleDataTable $dataTable){
        $menu = new DataModel();
        $leftmenu = $menu->getmenu();
        // dd($leftmenu);
        return $dataTable->render('vehicle',$leftmenu);
    }
}
