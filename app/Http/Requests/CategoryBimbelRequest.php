<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryBimbelRequest extends FormRequest
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
            'name'        => 'required',
            'class'       => 'required',
            'description' => 'nullable',
            'price'       => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'Nama Bimbel harus disini.',
            'class.required'       => 'Kelas harus diisi.',

            'price.required'       => 'Harga harus diisi.',
        ];
    }
}
