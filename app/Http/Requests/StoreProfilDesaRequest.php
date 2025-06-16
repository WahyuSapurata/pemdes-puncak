<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfilDesaRequest extends FormRequest
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
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required|array|min:1',
            'wilayah' => 'required',
            'struktur_organisasi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'sejarah.required' => 'Kolom sejarah harus di isi.',
            'visi.required' => 'Kolom visi harus di isi.',
            'misi.required' => 'Kolom misi harus di isi.',
            'wilayah.required' => 'Kolom wilayah harus di isi.',
            'struktur_organisasi.required' => 'Kolom struktur organisasi harus di isi.',
        ];
    }
}
