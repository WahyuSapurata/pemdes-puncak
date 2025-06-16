<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBeritaRequest extends FormRequest
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
            'isi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Kolom judul harus di isi.',
            'isi.required' => 'Kolom isi berita harus di isi.',
        ];
    }
}
