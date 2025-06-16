<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRiwayatPendudukRequest extends FormRequest
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
            'jenis_peristiwa' => 'required',
            'tanggal_peristiwa' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'uuid_penduduk.required' => 'Kolom nik harus di isi.',
            'jenis_peristiwa.required' => 'Kolom jenis peristiwa harus di isi.',
            'tanggal_peristiwa.required' => 'Kolom tanggal peristiwa harus di isi.',
        ];
    }
}
