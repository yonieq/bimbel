<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AdminDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] = 'List Data Admin';
    }

    public function index(AdminDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.admin.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.admin.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        //
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'no_telp' => $request->no_telp,
                'address' => $request->address,
                'is_admin' => true
            ]);

            if ($request->hasFile('photo')) {
                $logoFile = $request->file('photo');
                $logoData = base64_encode(file_get_contents($logoFile->path()));
                $logoExtension = $logoFile->getClientOriginalExtension();

                $data['photo'] = 'data:image/' . $logoExtension . ';base64,' . $logoData;
                $user->update($data);
            }

            return redirect()->route('user_admin.index')->with('success', 'Admin baru telah sukses dibuat');
        } catch (\Exception $e) {
            return redirect()->route('user_admin.index')->with('error', $e->getMessage());
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
        $this->data['user'] = User::findOrFail($id);

        return view('admin.admin.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = User::findOrFail($id);

            // Update name, email, and password if provided
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? bcrypt($request->password) : $user->password,
                'no_telp' => $request->no_telp,
                'address' => $request->address,
            ]);

            // Handle file upload
            if ($request->hasFile('photo')) {
                $logoFile = $request->file('photo');
                $logoData = base64_encode(file_get_contents($logoFile->path()));
                $logoExtension = $logoFile->getClientOriginalExtension();

                $data['photo'] = 'data:image/' . $logoExtension . ';base64,' . $logoData;
                $user->update($data);
            }

            return redirect()->route('user_admin.index')->with('success', 'Admin berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route('user_admin.index')->with('error', 'Terjadi kesalahan, hubungi administrator');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus data'
        ]);
    }
}
