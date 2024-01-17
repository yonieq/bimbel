<?php

namespace App\DataTables\Admin;

use App\Models\ScheduleBimbel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JadwalBimbelDataTable extends DataTable
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
                <a class="btn btn-sm btn-warning" href="' . route('jadwal_bimbel.edit', $data->id) . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                    <i class="bi bi-pencil"></i>
                </a>
                <form action="' . route('jadwal_bimbel.destroy', $data->id) . '" method="post" style="margin-left: 5px;"> <!-- Adjust margin as needed -->
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="button" class="btn btn-danger" onclick="deleteData(\'' . $data->id . '\')" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </div>';
            })
            ->editColumn('category_bimbel_id', function($data) {
                return $data->bimbel->name;
            })
            ->editColumn('days', function ($data) {
                $days = json_decode($data->days);

                return collect($days)->map(function ($day) {
                    return '<span class="badge bg-success">' . $day . '</span>';
                })->implode(' ');
            })
            ->editColumn('time_in', function ($data) {
                return Carbon::make($data->time_in)->format('H:i');
            })
            ->editColumn('time_out', function ($data) {
                return Carbon::make($data->time_out)->format('H:i');
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ScheduleBimbel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('jadwalbimbel-table')
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
            Column::make('category_bimbel_id')->title('Bimbel'),
            Column::make('days')->title('Hari'),
            Column::make('time_in')->title('Jam Masuk'),
            Column::make('time_in')->title('Jam Keluar'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'JadwalBimbel_' . date('YmdHis');
    }
}
