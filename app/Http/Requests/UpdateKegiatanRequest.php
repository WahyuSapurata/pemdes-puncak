<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKegiatanRequest extends FormRequest
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
            'nama_kegiatan' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_kegiatan.required' => 'Kolom nama kegiatan harus di isi.',
            'deskripsi.required' => 'Kolom deskripsi harus di isi.',
            'lokasi.required' => 'Kolom lokasi harus di isi.',
            'tanggal.required' => 'Kolom tanggal harus di isi.',
            'waktu.required' => 'Kolom waktu harus di isi.',
        ];
    }
}
