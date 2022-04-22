<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
        $rules = [
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'category_id' => [
                'required',
                'integer'
            ],
            'description' => [
                'required'
            ],
            'yt_iframe' => [
                'nullable',
                'string'
            ],
            'metaTitle' => [
                'required',
                'string'
            ],
            'metaDescription' => [
                'nullable',
                'string'
            ],
            'metaKeywords' => [
                'nullable',
                'string'
            ],
            'status' => [
                'nullable'
            ],
        ];

        return $rules;
    }
}
