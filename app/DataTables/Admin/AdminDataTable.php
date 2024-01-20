<?php

namespace App\DataTables\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AdminDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($data) {
                return '<div class="btn-group">
                <a type="button" class="btn btn-sm btn-warning" href="' . route('user_admin.edit', $data->id) . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                    <i class="bi bi-pencil"></i>
                </a>

                    <meta name="csrf-token" content="'. csrf_token() .'">

                <a href="javascript:void(0)" id="btn-delete-post" data-id="' . $data->id .'" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </div>';
            })
            ->editColumn('created_at', function($data) {
                return formatTanggal($data->created_at);
            })
            ->setRowId('id');
    }

    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->where('is_admin', true)->orderBy('created_at', 'desc');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('admin-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('add'),
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('name')->title('Nama'),
            Column::make('email'),
            Column::make('created_at')->title('Tanggal Dibuat')
//            Column::make('updated_at'),
        ];
    }

    protected function filename(): string
    {
        return 'Users_'.date('YmdHis');
    }
}
