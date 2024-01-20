<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\JadwalBimbelDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleBimbelRequest;
use App\Models\CategoryBimbel;
use App\Models\ScheduleBimbel;
use Illuminate\Http\Request;

class JadwalBimbelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] = 'List Data Jadwal Bimbel';
    }

    public function index(JadwalBimbelDataTable $dataTable)
    {
        return $dataTable->render('admin.jadwal_bimbel.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->data['bimbel'] = CategoryBimbel::all();

        return view('admin.jadwal_bimbel.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScheduleBimbelRequest $request)
    {
        //
//        dd($request->all());
        try {
            ScheduleBimbel::create([
                'category_bimbel_id' => $request->category_bimbel_id,
                'time_in' => $request->time_in,
                'time_out' => $request->time_out,
                'days' => json_encode($request->days),
            ]);
            return redirect()->route('jadwal_bimbel.index')->with('success', 'Data Jadwal Bimbel berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('jadwal_bimbel.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
    public function edit(string $id)
    {
        //
        $this->data['schedule'] = ScheduleBimbel::findOrFail($id);
        $this->data['bimbel'] = CategoryBimbel::all();

        return view('admin.jadwal_bimbel.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $schedule = ScheduleBimbel::findOrFail($id);

            $schedule->update([
                'category_bimbel_id' => $request->category_bimbel_id,
                'time_in' => $request->time_in,
                'days' => json_encode($request->days),
                'time_out' => $request->time_out,
            ]);

            return redirect()->route('jadwal_bimbel.index')->with('success', 'Data Jadwal Bimbel berhasil diperbarui.');
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
        $data = ScheduleBimbel::findOrFail($id);

        $data->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus data'
        ]);
    }
}
