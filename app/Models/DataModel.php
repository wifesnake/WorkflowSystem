<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class DataModel extends Model
{
    use HasFactory;

    public function getmenu(){
        $user = Auth::user()->attributes['is_admin'];
        $email = Auth::user()->attributes['email'];
        $name = Auth::user()->attributes['name'];
        $menu = DB::select('select * from tb_menu where status = ?', ['1']);
        $submenu = DB::select('select * from tb_submenu where status = ?', ['1']);
        return ['menus' => $menu,
                'submenus' => $submenu,
                'is_admin' => $user,
                'email' => $email,
                'name' => $name];
    }
}
