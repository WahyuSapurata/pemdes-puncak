<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAPBDSRequest extends FormRequest
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
            'tahun' => 'required',
            'jenis' => 'required',
            'sumber' => 'required',
            'uraian' => 'required',
            'jumlah' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tahun.required' => 'Kolom tahun harus di isi.',
            'jenis.required' => 'Kolom jenis harus di isi.',
            'sumber.required' => 'Kolom sumber/kategori harus di isi.',
            'uraian.required' => 'Kolom uraian harus di isi.',
            'jumlah.required' => 'Kolom jumlah harus di isi.',
        ];
    }
}
