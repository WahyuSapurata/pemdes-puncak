<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLapakDesaRequest extends FormRequest
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
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required',
            'gambar_produk' => 'required',
            'kategori_produk' => 'required',
            'nama_penjual' => 'required',
            'kontak_penjual' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_produk.required' => 'Kolom nama produk harus di isi.',
            'deskripsi_produk.required' => 'Kolom deskripsi produk harus di isi.',
            'harga_produk.required' => 'Kolom harga produk harus di isi.',
            'gambar_produk.required' => 'Kolom gambar produk harus di isi.',
            'kategori_produk.required' => 'Kolom kategori produk harus di isi.',
            'nama_penjual.required' => 'Kolom nama penjual harus di isi.',
            'kontak_penjual.required' => 'Kolom kontak penjual harus di isi.',
        ];
    }
}
