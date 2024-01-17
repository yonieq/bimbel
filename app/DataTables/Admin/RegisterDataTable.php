<?php

namespace App\DataTables\Admin;

use App\Models\StudentOfBimbel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RegisterDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
//            ->addColumn('action', 'register.action')
            ->editColumn('user_id', function ($data) {
                return $data->user->name;
            })
            ->editColumn('category_bimbel_id', function ($data) {
                return $data->bimbel->name;
            })
            ->editColumn('active', function ($data) {
                if ($data->active) {
                    return '<span class="badge bg-success">Aktif</span>';
                } else {
                    return '<span class="badge bg-danger">Belum Aktif</span>';
                }
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(StudentOfBimbel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('register-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
//            Column::computed('action')
//                  ->exportable(false)
//                  ->printable(false)
//                  ->width(60)
//                  ->addClass('text-center'),
//            Column::make('id'),
            Column::make('user_id')->title('Nama Murid'),
            Column::make('category_bimbel_id')->title('Nama Bimbel'),
            Column::make('active')->title('Status')
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Register_' . date('YmdHis');
    }
}
