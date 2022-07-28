<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoryRequest extends FormRequest
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
            'nama_kategori'                  => 'required|min:3|max:35',
            'cover_kategori'                 => 'required|mimes:jpg,jpeg,png',
        ];
    }
}
