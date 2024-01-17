<?php

namespace App\DataTables\Student;

use App\Models\CategoryBimbel;
use App\Models\ScheduleBimbel;
use App\Models\StudentOfBimbel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BimbelDataTable extends DataTable
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
                <a type="button" class="btn btn-sm btn-primary" href="' . route('bimbel.show', $data->id) . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail">
                    <i class="bi bi-eye"></i>
                </a>
            </div>';
            })
            ->editColumn('category_bimbel_id', function ($data) {
                return $data->bimbel->name;
            })
            ->addColumn('price', function ($data) {
                return 'Rp. ' . formatRupiah($data->bimbel->price) ?? '';
            })
            ->addColumn('class', function ($data) {
                return $data->bimbel->class ?? '';
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
        // check status

        return $model->newQuery()->whereHas('bimbel', function($data) {
           $data->whereHas('student', function($item) {
             $item->where('user_id', auth()->user()->id);
               $item->where('active', true);
           });
        });
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('bimbel-table')
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
            Column::make('price')->title('Harga'),
            Column::make('class')->title('Kelas'),
            Column::make('days')->title('Jadwal'),
            Column::make('time_in')->title('Jam Masuk'),
            Column::make('time_out')->title('Jam Keluar'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Bimbel_' . date('YmdHis');
    }
}
