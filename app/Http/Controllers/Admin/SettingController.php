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

        // Menghandle upload logo
        if ($request->hasFile('logo')) {
            $uploadedLogo = $request->file('logo');
            $logoFileName = $uploadedLogo->storeAs('logo', 'logo.' . $uploadedLogo->getClientOriginalExtension(), 'public');

            // Hapus logo lama jika ada
            if ($setting->logo) {
                Storage::disk('public')->delete('logo/' . $setting->logo);
            }

            $data['logo'] = $logoFileName;
        }

        // Menghandle upload banner
        if ($request->hasFile('banner')) {
            $uploadedBanner = $request->file('banner');
            $bannerFileName = $uploadedBanner->storeAs('banner', 'banner.' . $uploadedBanner->getClientOriginalExtension(), 'public');

            // Hapus banner lama jika ada
            if ($setting->banner) {
                Storage::disk('public')->delete('banner/' . $setting->banner);
            }

            $data['banner'] = $bannerFileName;
        }

        // Menyimpan data baru ke dalam database
        $setting->update($data);

        return redirect()->route('setting.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
