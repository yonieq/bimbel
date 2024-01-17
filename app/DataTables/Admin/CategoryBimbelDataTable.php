<?php

namespace App\DataTables\Admin;

use App\Models\CategoryBimbel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryBimbelDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($data) {
                return '<div class="btn-group">
                <a type="button" class="btn btn-sm btn-warning" href="' . route('bimbel.edit', $data->id) . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                    <i class="bi bi-pencil"></i>
                </a>
                <form action="' . route('bimbel.destroy', $data->id) . '" method="post">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                    <button type="button" class="btn btn-danger " onclick="deleteData(\'' . $data->id . '\')" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                           <i class="bi bi-trash"></i>
                     </button>
                 </form>
            </div>';
            })
            ->addColumn('price', function($data) {
                return formatRupiah($data->price);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(CategoryBimbel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('categorybimbel-table')
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
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('name')->title('Nama'),
            Column::make('class')->title('Kelas'),
            Column::make('price')->title('Harga'),
            Column::make('description')->title('Keterangan'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'CategoryBimbel_' . date('YmdHis');
    }
}
