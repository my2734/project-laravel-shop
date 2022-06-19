<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestKeyword extends FormRequest
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
            'k_name' => 'required|max:255|min:3|unique:keyword,k_name,' . $this->id
        ];
    }

    public function messages()
    {
        return [
            'k_name.required' => 'Vui lòng điền tên danh mục',
            'k_name.max' => 'Tên mục nhỏ hơn 255 kí tự',
            'k_name.unique' => 'Danh mục đã tồn tại',
            'k_name.min' => 'Tên danh mục phải lớn hơn 2 ký tự'
        ];
    }
}
