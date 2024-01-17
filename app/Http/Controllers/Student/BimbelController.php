<?php

namespace App\Http\Controllers\Student;

use App\DataTables\Student\BimbelDataTable;
use App\DataTables\Student\ListBimbelDataTable;
use App\Http\Controllers\Controller;
use App\Models\CategoryBimbel;
use App\Models\PaymentBimbel;
use App\Models\Rekening;
use App\Models\ScheduleBimbel;
use App\Models\StudentOfBimbel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BimbelController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(BimbelDataTable $dataTable)
    {
        return $dataTable->render('student.bimbel.index');
    }

    public function list(ListBimbelDataTable $dataTable)
    {
        return $dataTable->render('student.bimbel.list');
    }

    public function show($id)
    {
        $this->data['schedule'] = ScheduleBimbel::findOrFail($id);

        // check status
        $this->data['status'] = StudentOfBimbel::where('user_id', auth()->user()->id)
            ->where('category_bimbel_id', $this->data['schedule']->category_bimbel_id)
            ->first();
//        dd($this->data['status']->active == false);

        // list student
        $this->data['student'] = StudentOfBimbel::where('user_id', auth()->user()->id)
            ->where('category_bimbel_id', $this->data['schedule']->category_bimbel_id)
            ->where('active', true)
            ->with(['user'])->get();
//        dd($this->data['student']);

        // remark
        $this->data['payment'] = PaymentBimbel::where('user_id', auth()->user()->id)
            ->where('category_bimbel_id', $this->data['schedule']->category_bimbel_id)
            ->first();

        return view('student.bimbel.show', $this->data);
    }

    public function bimbel_register(Request $request, $id)
    {
        $user = auth()->user();

        $request->validate([
            'no_telp' => 'required|string',
            'address' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed file types and maximum size
        ]);

        StudentOfBimbel::create([
            'user_id' => $user->id,
            'category_bimbel_id' => $id,
            'active' => false,
        ]);

        $data = [
            'no_telp' => $request->no_telp,
            'address' => $request->address,
        ];

        // Handle file upload
        if ($request->hasFile('photo')) {
            $uploadedFile = $request->file('photo');
            $fileName = Str::random(20) . '.' . $uploadedFile->getClientOriginalExtension();

            // Store the file and get the path
            $uploadedFile->storeAs('user', $fileName, 'public');

            // Save the file path in the database
            $data['photo'] = $fileName;
        } elseif ($user->photo) {
            // Jika tidak ada file yang diunggah tetapi ada foto pengguna
            // Gunakan foto pengguna yang sudah ada
            $data['photo'] = $user->photo;
        }

        $user->update($data);

        // create payment
        $payment = PaymentBimbel::create([
            'user_id' => $user->id,
            'category_bimbel_id' => $id,
            'status' => 'pending'
        ]);

        return redirect()->route('bimbel.payment', $payment->id);
    }

    public function confirm_payment($id)
    {
        $this->data['payment'] = PaymentBimbel::findOrFail($id);
        $this->data['rekening'] = Rekening::all();

        return view('student.bimbel.payment', $this->data);
    }

    public function paid(Request $request, $id)
    {
        $payment = PaymentBimbel::findOrFail($id);

        $data = [
            'status' => 'waiting',
        ];

        if ($request->hasFile('image_payment')) {
            $uploadedFile = $request->file('image_payment');
            $fileName = Str::random(20) . '.' . $uploadedFile->getClientOriginalExtension();

            // Store the file and get the path
            $uploadedFile->storeAs('image_payment', $fileName, 'public');

            // Save the file path in the database
            $data['image_payment'] = $fileName;
        }

        $payment->update($data);

        return redirect()->route('payment.index')->with('success', 'Terima kasih telah melakukan pembayaran, selanjut admin akan menkonfirmasi pembayarana anda.');
    }
}
