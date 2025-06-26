<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSuratMasukRequest extends FormRequest
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
            'nomor_surat' => 'required',
            'pengirim' => 'required',
            'perihal' => 'required',
            'tanggal_surat' => 'required',
            'tanggal_diterima' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nomor_surat.required' => 'Kolom nomor surat harus di isi.',
            'pengirim.required' => 'Kolom pengirim harus di isi.',
            'perihal.required' => 'Kolom perihal harus di isi.',
            'tanggal_surat.required' => 'Kolom tanggal surat harus di isi.',
            'tanggal_diterima.required' => 'Kolom tanggal diterima harus di isi.',
        ];
    }
}
