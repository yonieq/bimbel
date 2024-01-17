<?php

namespace App\DataTables\Admin;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class InvoiceDataTable extends DataTable
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
                                <a href="' . route('bimbel.payment', $data->id) . '" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Cetak Invoice"><i class="bi bi-printer"></i></a>
                            </div>';
            })
            ->editColumn('created_at', function ($data) {
                return formatTanggal($data->created_at);
            })
            ->editColumn('user', function ($data) {
                return $data->student->user->name;
            })
            ->editColumn('bimbel', function ($data) {
                return $data->payment->bimbel->name;
            })
            ->editColumn('price', function ($data) {
                return 'Rp. '. formatRupiah($data->payment->bimbel->price);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Invoice $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('invoice-table')
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
            Column::make('code'),
            Column::make('user')->title('Nama murid'),
            Column::make('bimbel')->title('Nama bimbel'),
            Column::make('price')->title('Harga bimbel'),
            Column::make('created_at')->title('Tanggal dibuat'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Invoice_' . date('YmdHis');
    }
}
