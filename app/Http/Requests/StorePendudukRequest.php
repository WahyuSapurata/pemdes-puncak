<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePendudukRequest extends FormRequest
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
            'nik' => [
                'required',
                'digits:16',
                Rule::unique('penduduks', 'nik')->ignore($this->route('params'), 'uuid'),
            ],
            'kk' => 'required|digits:16',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required',
            'agama' => 'required|string',
            'status_perkawinan' => 'required|string',
            'pekerjaan' => 'required|string',
            'alamat' => 'required|string',
            'dusun' => 'required|string',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'kewarganegaraan' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'golongan_darah' => 'required|string',
            'status_dalam_keluarga' => 'required|string',
            'ayah' => 'required|string',
            'ibu' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'nik.required' => 'Kolom NIK harus di isi.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit angka.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'kk.required' => 'Kolom KK harus di isi.',
            'kk.digits' => 'KK harus terdiri dari 16 digit angka.',
            'nama.required' => 'Kolom nama harus di isi.',
            'jenis_kelamin.required' => 'Kolom jenis kelamin harus di isi.',
            'tempat_lahir.required' => 'Kolom tempat lahir harus di isi.',
            'tanggal_lahir.required' => 'Kolom tanggal lahir harus di isi.',
            'tanggal_lahir.date' => 'Tanggal lahir tidak valid.',
            'agama.required' => 'Kolom agama harus di isi.',
            'status_perkawinan.required' => 'Kolom status perkawinan harus di isi.',
            'pekerjaan.required' => 'Kolom pekerjaan harus di isi.',
            'alamat.required' => 'Kolom alamat harus di isi.',
            'dusun.required' => 'Kolom dusun harus di isi.',
            'rt.required' => 'Kolom RT harus di isi.',
            'rw.required' => 'Kolom RW harus di isi.',
            'kewarganegaraan.required' => 'Kolom kewarganegaraan harus di isi.',
            'pendidikan_terakhir.required' => 'Kolom pendidikan terakhir harus di isi.',
            'golongan_darah.required' => 'Kolom golongan darah harus di isi.',
            'status_dalam_keluarga.required' => 'Kolom status dalam keluarga harus di isi.',
            'ayah.required' => 'Kolom nama ayah harus di isi.',
            'ibu.required' => 'Kolom nama ibu harus di isi.',
        ];
    }
}
