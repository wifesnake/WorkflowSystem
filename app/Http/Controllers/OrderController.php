<?php

namespace App\Http\Controllers;

use App\DataTables\CustomerDataTable;
use App\Http\Controllers\Controller;
use App\Models\DataModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(CustomerDataTable $dataTable){
        $menu = new DataModel();
        $leftmenu = $menu->getmenu();
        // dd($leftmenu);
        return $dataTable->render('customer',$leftmenu);
    }
}
