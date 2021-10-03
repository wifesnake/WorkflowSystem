<?php

namespace App\Http\Controllers;

use App\DataTables\VehicleDataTable;
use App\Http\Controllers\Controller;
use App\Models\DataModel;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(VehicleDataTable $dataTable){
        $menu = new DataModel();
        $leftmenu = $menu->getmenu();
        // dd($leftmenu);
        return $dataTable->render('vehicle',$leftmenu);
    }
}
