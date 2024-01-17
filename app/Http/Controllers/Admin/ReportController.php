<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ReportDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] = 'Data Laporan Keuangan';
    }

    public function index(ReportDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.report.index', $this->data);
    }
}
