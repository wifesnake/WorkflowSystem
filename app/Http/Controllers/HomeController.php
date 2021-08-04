<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;

class HomeController extends Controller
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
        $menu = new DataModel;
        $leftmenu = $menu->getmenu();
        //dd($leftmenu);

        return view('home',$leftmenu);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $menu = new DataModel;
        $leftmenu = $menu->getmenu();
        //dd($leftmenu);

        return view('adminHome',$leftmenu);
    }
}
