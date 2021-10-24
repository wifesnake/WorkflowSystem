<?php

namespace App\DataTables;

use App\Models\Customer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class CustomerDataTable extends DataTable
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
            ->addColumn('action', 'customer.action')
            ->addColumn('action',function($row){
                return '<div style="display:flex"><div onClick="onEdit(\''.$row->customer_id.'\',\'view\');" class="btn btn-sm btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">View</div>
                &nbsp;<div style="display:flex"><div onClick="onEdit(\''.$row->customer_id.'\',\'edit\');" class="btn btn-sm btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Edit</div>
                &nbsp;<div onClick="onDelete('.$row->id.',\''.$row->customer_name.'\');" class="btn btn-sm btn-danger btn-sm">Delete</div></div>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Customer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Customer $model)
    {
        return $model->newQuery()
                    ->where("status",1);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('customer-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax();
                    // ->dom('Bfrtip')
                    // ->orderBy(1)
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
            "customer_id" => ['title' => 'รหัสลูกค้า'],
            "customer_name" => ['title' => 'ชื่อบริษัท'],
            "address" => ['title' => 'ที่อยู่'],
            "phone" => ['title' => 'หมายเลขโทรศัพท์'],
            "customer_person_number" => ['title' => 'เลขที่นิติบุคคล'],
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
        return 'Customer_' . date('YmdHis');
    }
}
