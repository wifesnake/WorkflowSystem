<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\EmployeeDataTable;
use App\Models\DataModel;

class EmployeeController extends Controller
{
    public function index(EmployeeDataTable $dataTable){
        $menu = new DataModel;
        $leftmenu = $menu->getmenu();
        return $dataTable->render('employee', $leftmenu);
    }
}
