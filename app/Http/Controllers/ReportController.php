<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use Illuminate\Http\Request;

class ReportController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menu = new DataModel();
        $leftmenu = $menu->getmenu();
        //dd($leftmenu);

        return view('report',$leftmenu);
    }
}
