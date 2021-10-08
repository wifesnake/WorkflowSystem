<?php

namespace App\DataTables;

use App\Models\Employee;
use PhpParser\Node\Expr\FuncCall;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployeeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('fullname', function($row){
                return $row->name." ".$row->lastname;
            })
            ->addColumn('action',function($row){
                 return '<div onClick="onEdit('.$row->id.');" class="btn btn-sm btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Edit</div>
                 <div onClick="onDelete('.$row->id.',\''.$row->name.' '.$row->lastname.'\');" class="btn btn-sm btn-danger btn-sm">Delete</div>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Employee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Employee $model)
    {
        // return $model->newQuery()
                            return Employee::select(
                                'employees.id',
                                'employees.employee_id',
                                'employees.name',
                                'employees.lastname',
                                'employees.phone',
                                'employees.email',
                                'employees.phone',
                                'employees.salary',
                                't2.value_lookup as employeetype',
                                't3.value_lookup as departmenttype'
                            )
                            ->join('tb_lookup as t2', function($q){
                                $q->on('employees.employee_type', '=', 't2.code_lookup');
                                $q->where('t2.name_lookup', '=', "employeetype");
                                $q->select('t2.value_lookup', 't2.id as t2id');
                            })
                            ->join('tb_lookup as t3', function($q){
                                $q->on('employees.department', '=', 't3.code_lookup');
                                $q->where('t3.name_lookup', '=', "department");
                                $q->select('t3.value_lookup','t3.id as t3id');
                            })
                            // ->select(
                            //     'id',
                            //     'employee_id',
                            //     'name',
                            //     'lastname',
                            //     'phone',
                            //     'email',
                            //     'phone',
                            //     'salary',
                            //     't2.value_lookup as employeetype',
                            //     't3.value_lookup as departmenttype'
                            // )
                            ;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('employee-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->removeColumn('id')
                    ->orderBy(0, 'asc');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' ,
            'fullname' => ['title' => 'ชื่อ-สกุล'],
            'email' => ['title' => 'E-mail'],
            'phone' => ['title' => 'หมายเลขโทรศัพท์'] ,
            'salary' => ['title' => 'เงินเดือน'] ,
            'employeetype' => ['title' => 'ประเภทพนักงาน'] ,
            'departmenttype' => ['title' => 'หน่วยงาน'],
            'action' => ['title' => 'Action']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Employee_' . date('YmdHis');
    }
}
