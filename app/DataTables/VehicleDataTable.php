<?php

namespace App\DataTables;

use App\Models\Vehicle;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class VehicleDataTable extends DataTable
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
            ->addColumn('action',function($row){
                 return '<div onClick="onEdit('.$row->id.',\'view\');" class="btn btn-sm btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">View</div>&nbsp;<div onClick="onEdit('.$row->id.',\'edit\');" class="btn btn-sm btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Edit</div>
                 <div onClick="onDelete('.$row->id.',\''.$row->regis_id.'\');" class="btn btn-sm btn-danger btn-sm">Delete</div>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Vehicle $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Vehicle $model)
    {
        return $model->newQuery()
                        //Vehicle::table('employees')
                        ->join('tb_lookup as t2', function($q){
                            $q->on('tb_vehicle.isTrucktype', '=', 't2.code_lookup');
                            $q->where('t2.name_lookup', '=', "vehicletype");
                            $q->select('t2.value_lookup');
                        })
                        ->join('tb_lookup as t3', function($q){
                            $q->on('tb_vehicle.cartype', '=', 't3.code_lookup');
                            $q->where('t3.name_lookup', '=', "usevehicle");
                            $q->select('t3.value_lookup');
                        })
                        ->join('tb_customer as t4', function($q){
                            $q->on('tb_vehicle.car_location', '=', 't4.customer_id');
                        })
                        ->select('tb_vehicle.id','car_id','regis_id', 't4.customer_name' , 'car_brand','car_location','t3.value_lookup as cartypename','t2.value_lookup as trucktype')
                        ->where('tb_vehicle.status',1);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('vehicle-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax();
                    // ->dom('Bfrtip')
                    // ->orderBy(1);
                    // ->buttons(
                    //     Button::make('create'),
                    //     Button::make('export'),
                    //     Button::make('print'),
                    //     Button::make('reset'),
                    //     Button::make('reload')
                    // );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            "car_id" => ['title' => 'รหัสรถ'],
            "regis_id" => ['title' => 'หมายเลขทะเบียน'],
            "car_brand" => ['title' => 'รายละเอียดรถ'],
            "customer_name" => ['title' => 'สถานที่ใช้งาน'],
            "trucktype" => ['title' => 'ประเภทรถ'],
            "cartypename" => ['title' => 'สถานะของรถ'],
            "action" => ['title' => 'Action']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Vehicle_' . date('YmdHis');
    }
}
