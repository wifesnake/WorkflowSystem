<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use Illuminate\Http\Request;

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
        //dd($leftmenu);

        return view('request',$leftmenu);
    }
}
