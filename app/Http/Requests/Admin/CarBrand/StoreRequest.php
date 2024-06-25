<?php

namespace App\Http\Requests\Admin\CarBrand;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Поле title обязательно к заполению',
            'title.string' => 'Поле title должно быть типа "строка"',
            'title.max' => 'Поле title не должно превышать 50 символов'
        ];
    }
}
