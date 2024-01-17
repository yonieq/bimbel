<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\InvoiceDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] = 'List Data Invoice';
    }

    public function index(InvoiceDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.invoice.index', $this->data);
    }
}
