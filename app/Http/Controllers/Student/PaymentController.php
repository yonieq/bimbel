<?php

namespace App\Http\Controllers\Student;

use App\DataTables\Student\PaymentDataTable;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\PaymentBimbel;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(PaymentDataTable $dataTable)
    {
        //
        return $dataTable->render('student.pembayaran.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function download_invoice($id)
    {
        $this->data['payment'] = PaymentBimbel::findOrFail($id);

        // Setting
        $this->data['setting'] = Setting::first();

        // check invoice data
        $this->data['invoice'] = Invoice::where('payment_bimbels_id', $id)->first();

        $pdf = Pdf::loadView('template.invoice', $this->data);
//
        return $pdf->download($this->data['invoice']->code.'.pdf');
    }
}
