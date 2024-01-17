<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CategoryBimbelDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryBimbelRequest;
use App\Models\CategoryBimbel;
use Illuminate\Http\Request;

class CategoryBimbelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] = 'List Data Category Bimbel';
    }
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryBimbelDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.category_bimbel.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category_bimbel.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryBimbelRequest $request)
    {
        //
        try {
            CategoryBimbel::create([
                'name' => $request->name,
                'class' => $request->class,
                'description' => $request->description,
                'price'       => str_replace('.', '', $request->price),
            ]);
            return redirect()->route('bimbel.index')->with('success', 'Data Kategory Bimbel berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
    public function edit($id)
    {
        //
        $this->data['bimbel'] = CategoryBimbel::findOrFail($id);

        return view('admin.category_bimbel.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryBimbelRequest $request, $id)
    {
        //
        $data = CategoryBimbel::findOrFail($id);

        try {
            $data->update([
                'name' => $request->name,
                'class' => $request->class,
                'description' => $request->description,
                'price'       => str_replace('.', '', $request->price),
            ]);
            return redirect()->route('bimbel.index')->with('success', 'Data Kategory Bimbel berhasil diubah.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = CategoryBimbel::findOrFail($id);

        try {
            $data->delete();
            return redirect()->route('bimbel.index')->with('success', 'Data Kategory Bimbel berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
