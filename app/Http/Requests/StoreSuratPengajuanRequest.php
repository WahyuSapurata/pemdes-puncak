<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuratPengajuanRequest extends FormRequest
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
            'nik' => 'required|digits:16',
            'nomor' => 'required',
            'jenis_surat' => 'required',
            'keterangan' => 'required',
            'file_ktp' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'nik.required' => 'Kolom nik harus di isi.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit angka.',
            'nomor.required' => 'Kolom nomor telepon/WA harus di isi.',
            'jenis_surat.required' => 'Kolom jenis surat harus di isi.',
            'keterangan.required' => 'Kolom keterangan harus di isi.',
            'file_ktp.required' => 'Kolom file ktp harus di isi.',
        ];
    }
}
