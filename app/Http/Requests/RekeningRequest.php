<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RekeningRequest extends FormRequest
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
            'no'   => 'required|numeric|unique:rekenings,no,' . $this->route('rekening'),
            'bank' => 'required',
            'name' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'no.required'   => 'Nomor rekening harus diisi.',
            'no.numeric'    => 'Nomor rekening harus berupa angka.',
            'no.unique'     => 'Nomor rekening sudah digunakan.',
            'bank.required' => 'Nama bank harus diisi.',
            'name.required' => 'Atas Nama rekening harus diisi.',
        ];
    }
}
