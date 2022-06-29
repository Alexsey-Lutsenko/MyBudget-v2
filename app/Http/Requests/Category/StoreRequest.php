<?php

namespace App\Http\Requests\Category;

use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories')->where('user_id', Request::input('user_id')),
            ]
        ];
    }
}
