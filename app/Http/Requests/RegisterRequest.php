<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'                  => 'required|min:4|max:35',
            'email'                 => 'required|email|unique:users,email',
            'no_hp'                 => 'required|unique:users,no_hp',
            'nama_usaha'            => 'required|min:4|max:35',
            'keterangan'            => 'required|min:4|max:35',
            'password'              => 'required|min:8|confirmed',
            'cover'                 => 'required|mimes:jpg,jpeg,png',
        ];
    }
}
