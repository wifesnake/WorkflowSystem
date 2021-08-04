<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;

class CancelController extends Controller
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

        return view('cancel',$leftmenu);
    }
}
