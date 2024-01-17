<?php

namespace App\DataTables\Admin;

use App\Models\PaymentBimbel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PaymentDataTable extends DataTable
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
                if ($data->status === 'pending') {
                    return '<div class="btn-group">
                                <a href="' . route('admin_payment.show', $data->id) . '" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat Detail"><i class="bi bi-eye"></i></a>
                            </div>';
                } elseif ($data->status === 'success') {
                    return '<div class="btn-group">
                                <a href="' . route('admin_payment.show', $data->id) . '" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat Detail"><i class="bi bi-eye"></i></a>
                            </div>';
                } elseif ($data->status === 'waiting') {
                    return '<div class="btn-group">
                                <a href="' . route('admin_payment.edit', $data->id) . '" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Konfirmasi Pembayaran"><i class="bi bi-pencil"></i></a>
                            </div>';
                } else {
                    return '<div class="btn-group">
                                <a href="' . route('admin_payment.show', $data->id) . '" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat Detail"><i class="bi bi-eye"></i></a>
                            </div>';
                }
            })
            ->editColumn('category_bimbel_id', function ($data) {
                return $data->bimbel->name;
            })
            ->editColumn('price', function ($data) {
                return 'Rp. ' . formatRupiah($data->bimbel->price);
            })
            ->editColumn('status', function ($data) {
                if ($data->status === 'pending') {
                    return '<span class="badge bg-secondary">Belum Melakukan Pembayaran</span>';
                } elseif ($data->status === 'waiting') {
                    return '<span class="badge bg-warning">Menunggu Konfirmasi Admin</span>';
                } elseif ($data->status === 'done') {
                    return '<span class="badge bg-success">Pembyaran Berhasil</span>';
                } else {
                    return '<span class="badge bg-danger">Pembayaran Ditolak</span>';
                }
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PaymentBimbel $model): QueryBuilder
    {
        $requestStatus = request()->status;

        if ($requestStatus === 'waiting')
            return $model->newQuery()->where('status', 'waiting');
        elseif ($requestStatus === 'pending') {
            return $model->newQuery()->where('status', 'pending');
        } elseif ($requestStatus === 'reject') {
            return $model->newQuery()->where('status', 'reject');
        } elseif ($requestStatus === 'done') {
            return $model->newQuery()->where('status', 'done');
        } else {
            return $model->newQuery();
        }
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('payment-table')
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
            Column::make('category_bimbel_id')->title('Nama Bimbel'),
            Column::make('price')->title('Harga'),
            Column::make('status'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Payment_' . date('YmdHis');
    }
}
