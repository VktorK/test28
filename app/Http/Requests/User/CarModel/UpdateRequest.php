<?php

namespace App\Http\Requests\User\CarModel;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'car_brand_id' => 'nullable|integer|exists:car_brands,id',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.string'=> 'Поле "title" должно быть типа "Строка"',
            'car_brand_id.integer'=> 'Поле "Идентификатор бренда автомобиля" должно быть целочисленным'
        ];
    }
}
