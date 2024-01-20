<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->data['title'] = 'Menu pengaturan aplikasi';
    }

    //
    public function index()
    {
        $this->data['setting'] = Setting::first();

        return view('admin.setting.index', $this->data);
    }

    public function update(SettingRequest $request)
    {
        $setting = Setting::first();

        // Memproses data yang diterima dari form
        $data = [
            'app_name' => $request->input('app_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'description' => $request->input('description'),
        ];

        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoData = base64_encode(file_get_contents($logoFile->path()));
            $logoExtension = $logoFile->getClientOriginalExtension();

            $data['logo'] = 'data:image/' . $logoExtension . ';base64,' . $logoData;
        }

        if ($request->hasFile('banner')) {
            $bannerFile = $request->file('banner');
            $bannerData = base64_encode(file_get_contents($bannerFile->path()));
            $bannerExtension = $bannerFile->getClientOriginalExtension();

            $data['banner'] = 'data:image/' . $bannerExtension . ';base64,' . $bannerData;
        }

        $setting->update($data);

        return redirect()->route('setting.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
