<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RekeningDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RekeningRequest;
use App\Models\Rekening;
use Illuminate\Support\Facades\Request;

class RekeningController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] = 'List Data Rekening';
    }

    public function index(RekeningDataTable $dataTable)
    {
        return $dataTable->render('admin.rekening.index', $this->data);
    }

    public function create()
    {
        return view('admin.rekening.create', $this->data);
    }

    public function store(RekeningRequest $request)
    {
        try {
            Rekening::create($request->all());
            return redirect()->route('rekening.index')->with('success', 'Data rekening berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $this->data['rekening'] = Rekening::findOrFail($id);

        return view('admin.rekening.edit', $this->data);
    }

    public function update(RekeningRequest $request, $id)
    {
        $data = Rekening::findOrFail($id);

        try {
            $data->update($request->all());
            return redirect()->route('rekening.index')->with('success', 'Data rekening berhasil diubah.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $data = Rekening::findOrFail($id);

        $data->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus data'
        ]);
    }
}
