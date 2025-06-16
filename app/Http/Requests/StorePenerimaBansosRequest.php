<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenerimaBansosRequest extends FormRequest
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
            'uuid_penduduk' => 'required',
            'jenis_bansos' => 'required',
            'tahun' => 'required',
            'jumlah_termin' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'uuid_penduduk.required' => 'Kolom nik harus di isi.',
            'jenis_bansos.required' => 'Kolom jenis bansos harus di isi.',
            'tahun.required' => 'Kolom tahun harus di isi.',
            'jumlah_termin.required' => 'Kolom jumlah termin harus di isi.',
        ];
    }
}
