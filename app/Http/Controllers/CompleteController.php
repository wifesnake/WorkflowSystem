<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;

class CompleteController extends Controller
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

    public function index()
    {
        $menu = new DataModel;

        $leftmenu = $menu->getmenu();
        //dd($leftmenu);

        return view('complete',$leftmenu);
    }
}
