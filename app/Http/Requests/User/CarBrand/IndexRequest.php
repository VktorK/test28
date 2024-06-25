<?php

namespace App\Http\Requests\User\CarBrand;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
            'create_from'=> 'nullable|date_format:Y-m-d H:i:s',
            'create_to'=> 'nullable|date_format:Y-m-d H:i:s'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'title.string' => 'Поле "title" должно быть типа строка',
            'create_from.date' => 'Поле "create_from" должно быть типа date',
            'create_to.date' => 'Поле "create_to" должно быть типа create_to',
        ];
    }
}
