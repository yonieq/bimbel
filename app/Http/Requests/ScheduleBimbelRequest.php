<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleBimbelRequest extends FormRequest
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
            'category_bimbel_id'        => 'required|unique:schedule_bimbels,category_bimbel_id' . $this->route('schedule_bimbels'),
            'time_in'                   => 'required',
            'time_out'                  => 'required',
            'days'                      => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'category_bimbel_id.required'   => 'Bimbel harus diisi.',
            'category_bimbel_id.unique'     => 'Bimbel sudah ada jadwal.',
            'time_in.required' => 'Jam masuk harus diisi.',
            'time_out.required' => 'Jam keluar harus diisi.',
            'days.required' => 'Haris harus diisi.',
        ];
    }
}
