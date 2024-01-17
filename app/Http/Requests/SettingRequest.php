<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'app_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'app_name.required' => 'Nama aplikasi harus diisi.',
            'app_name.max' => 'Nama aplikasi tidak boleh lebih dari :max karakter.',
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.max' => 'Alamat email tidak boleh lebih dari :max karakter.',
            'phone.required' => 'Nomor telepon harus diisi.',
            'phone.max' => 'Nomor telepon tidak boleh lebih dari :max karakter.',
            'address.string' => 'Alamat harus berupa teks.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'logo.image' => 'Logo harus berupa file gambar.',
            'logo.mimes' => 'Format file logo tidak valid. Pilih format: jpeg, png, jpg, gif.',
            'logo.max' => 'Ukuran file logo tidak boleh lebih dari :max kilobyte.',
            'banner.image' => 'Banner harus berupa file gambar.',
            'banner.mimes' => 'Format file banner tidak valid. Pilih format: jpeg, png, jpg, gif.',
            'banner.max' => 'Ukuran file banner tidak boleh lebih dari :max kilobyte.',
        ];
    }
}
