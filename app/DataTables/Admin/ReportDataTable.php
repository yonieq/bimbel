<?php

namespace App\DataTables\Admin;

use App\Models\PaymentBimbel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReportDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('category_bimbel_id', function ($data) {
                return $data->bimbel->name;
            })
            ->addColumn('price', function ($data) {
                return 'Rp. ' .formatRupiah($data->bimbel->price);
            })
            ->editColumn('created_at', function($data) {
                return formatTanggal($data->created_at);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PaymentBimbel $model): QueryBuilder
    {
        $dateRange = request()->date_range;

        if (!empty($dateRange)) {
            // Pisahkan tanggal mulai dan selesai dari parameter date_range
            $dateParts = explode('/', $dateRange);

            // Periksa apakah array memiliki indeks yang diperlukan
            if (count($dateParts) === 2) {
                [$startDate, $endDate] = $dateParts;

                return $model->newQuery()
                    ->where('status', 'done')
                    ->whereBetween('created_at', [Carbon::parse($startDate)->startOfDay(), Carbon::parse($endDate)->endOfDay()]);
            }
        }

        // Jika tidak ada tanggal atau format tidak benar, kembalikan query tanpa filter tanggal
        return $model->newQuery()->where('status', 'done');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('report-table')
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
            Column::make('category_bimbel_id')->title('Nama Bimbel'),
            Column::make('price')->title('Harga'),
            Column::make('created_at')->title('Tanggal Transaksi'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Report_' . date('YmdHis');
    }
}
