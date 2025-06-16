<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGaleriRequest extends FormRequest
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
            'judul' => 'required',
            'gambar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Kolom judul harus di isi.',
            'gambar.required' => 'Kolom gambar harus di isi.',
        ];
    }
}
