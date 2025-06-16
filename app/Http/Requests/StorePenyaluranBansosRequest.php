<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenyaluranBansosRequest extends FormRequest
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
            'termin' => 'required',
            'tanggal_penyaluran' => 'required',
            'keterangan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'termin.required' => 'Kolom termin harus di isi.',
            'tanggal_penyaluran.required' => 'Kolom tanggal penyaluran harus di isi.',
            'keterangan.required' => 'Kolom keterangan harus di isi.',
        ];
    }
}
