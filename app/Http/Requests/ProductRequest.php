<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kategori_id' => 'required|integer',
            'nama_produk' => 'required|string|min:4',
            'deskripsi_produk' => 'required|string',
            'cover_produk' => 'required|mimes:png,jpg|image',
            'qty' => 'required|min:1',
            'harga' => 'required|min:3',
        ];
    }
}
