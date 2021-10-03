<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DataModel extends Model
{
    use HasFactory;

    public function getmenu(){
        $user = Auth::user()->attributes['is_admin'];
        $email = Auth::user()->attributes['email'];
        $name = Auth::user()->attributes['name'];
        $menu = DB::select("select t1.id,t1.name,isnull(t1.link) as Islink,t1.link,t1.icon,t1.status,t2.menu_id as is_menu FROM tb_menu t1 LEFT JOIN tb_submenu t2 on t2.menu_id = t1.id WHERE t1.status = ? GROUP BY t1.id,t1.name,t1.link,t1.icon,t1.status,t2.menu_id", ['1']);
        $submenu = DB::select('select * from tb_submenu where status = ?', ['1']);
        $titlename = DB::select("select * from tb_lookup where name_lookup = 'titlename'");
        //$runno = DB::select("select lpad(lpad(runno,6,'0'),8,'OR') as runno FROM tb_runorderno WHERE status = ?",['1']);

        // $isRunno = "";
        // foreach ($runno as $key => $value) {
        //     foreach($value as $key2 => $value2){
        //         $isRunno = $value2;
        //     }

        // }

        return ['menus' => $menu,
                'submenus' => $submenu,
                'is_admin' => $user,
                'email' => $email,
                'name' => $name,
                'titlenames' => $titlename];
    }
}
