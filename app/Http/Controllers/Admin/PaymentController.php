<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PaymentDataTable;
use App\Http\Controllers\Controller;
use App\Models\CategoryBimbel;
use App\Models\PaymentBimbel;
use App\Models\StudentOfBimbel;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private mixed $data;

    public function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] = 'List Data Pembayaran';
    }
    /**
     * Display a listing of the resource.
     */
    public function index(PaymentDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.payment.index', $this->data);
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
        $this->data['payment'] = PaymentBimbel::findOrFail($id);

        $this->data['bimbel'] = CategoryBimbel::where('id', $this->data['payment']->category_bimbel_id)
            ->with(['schedule', 'student.user'])
            ->first();

        return view('admin.payment.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $this->data['payment'] = PaymentBimbel::findOrFail($id);

        $this->data['bimbel'] = CategoryBimbel::where('id', $this->data['payment']->category_bimbel_id)
            ->with(['schedule', 'student.user'])
            ->first();

        return view('admin.payment.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $payment = PaymentBimbel::findOrFail($id);

        $payment->update([
            'status' => $request->status,
            'remark' => $request->remark,
        ]);

        // update status active in student
        if ($request->status === 'done') {
            $student = StudentOfBimbel::where('category_bimbel_id', $payment->category_bimbel_id)
                ->where('user_id', $payment->user_id)
                ->first();

            $student->update([
                'active' => true,
            ]);
        }

        return redirect()->route('admin_payment.index')->with('success', 'Pembayaran user berhasil di konfirmasi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
