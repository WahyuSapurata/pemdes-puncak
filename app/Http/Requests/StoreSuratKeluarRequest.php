<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuratKeluarRequest extends FormRequest
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
            'tanggal_surat' => 'required',
            'tujuan' => 'required',
            'perihal' => 'required',
            'isi_ringkas' => 'required',
            'file_surat' => 'required|file|mimes:pdf|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'nomor_surat.required' => 'Kolom nomor surat harus di isi.',
            'tanggal_surat.required' => 'Kolom tanggal surat harus di isi.',
            'tujuan.required' => 'Kolom tujuan harus di isi.',
            'perihal.required' => 'Kolom perihal harus di isi.',
            'isi_ringkas.required' => 'Kolom isi singakt surat harus di isi.',
            'file_surat.required' => 'Kolom file surat harus di isi.',
        ];
    }
}
