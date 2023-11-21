<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UngVienCoBanRequest extends FormRequest
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
            'hoten' => 'required',
            'ngaysinh' => 'required',
            'huyen' => 'required',
            'xa' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Trường này không được để trống',
        ];
    }
}
