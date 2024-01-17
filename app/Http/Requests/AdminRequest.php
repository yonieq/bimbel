<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'address' => 'nullable',
            'no_telp' => 'required|numeric',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Menambahkan aturan validasi gambar
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Alamat email harus berupa format email yang valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'no_telp.required' => 'Nomor telepon harus diisi.',
            'no_telp.numeric' => 'Nomor telepon harus berupa angka.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format gambar yang diterima: jpeg, png, jpg, gif, svg.',
            'photo.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
        ];
    }
}
