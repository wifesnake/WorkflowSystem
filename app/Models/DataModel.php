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
        $employeetype = DB::select("select code_lookup, value_lookup from tb_lookup where name_lookup = 'employeetype'");
        $ordvehicle = DB::select("select CONCAT(lpad(CONCAT(substring(lpad(now(),4),3,4),lpad(runno,6,'0')),10,'VC'),'TH') as runno FROM tb_runorderno WHERE status = ? and istype = 'ordervehicle'",['1']);
        $employeeno = DB::select("select lpad(COUNT(id)+1,5,'0') as runno FROM `employees`");
        $vehicleno = DB::select("select lpad( lpad(runno,6,'0'),7,'V') as runno FROM tb_runorderno where istype = 'vehicle'");
        $department = DB::select("select code_lookup, value_lookup from tb_lookup where name_lookup = 'department'");
        $usevehicle = DB::select("select code_lookup, value_lookup from tb_lookup where name_lookup = 'usevehicle'");
        $vehicletype = DB::select("select code_lookup, value_lookup from tb_lookup where name_lookup = 'vehicletype'");
        $tb_customer = DB::select("select customer_id, customer_name from tb_customer ");
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
                'titlenames' => $titlename,
                'employeetype'=> $employeetype,
                'ordvehicle' => $ordvehicle,
                'employeeno' => $employeeno,
                'department' => $department,
                'usevehicle' => $usevehicle,
                'tb_customer' => $tb_customer,
                'vehicletype' => $vehicletype,
                'vehicleno' => $vehicleno,
            ];
    }
}
