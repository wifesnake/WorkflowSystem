<?php

namespace App\Http\Controllers;

use App\DataTables\CustomerDataTable;
use App\Http\Controllers\Controller;
use App\Models\DataModel;
use Illuminate\Http\Request;

class OrderController extends Controller
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
    
    public function index(CustomerDataTable $dataTable){
        $menu = new DataModel();
        $leftmenu = $menu->getmenu();
        // dd($leftmenu);
        return $dataTable->render('customer',$leftmenu);
    }
}
