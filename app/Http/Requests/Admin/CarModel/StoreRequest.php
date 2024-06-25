<?php

namespace App\Http\Requests\Admin\CarModel;

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
            'title' => 'required|string',
            'car_brand_id' => 'required|integer|exists:car_brands,id',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'title.required'=> 'Поле "title" обязательно к заполнению',
            'car_brand_id.required'=> 'Поле "Идентификатор бренда автомобиля" обязательно к заполнению',
            'title.string'=> 'Поле "title" должно быть типа "Строка"',
            'car_brand_id.integer'=> 'Поле "Идентификатор бренда автомобиля" должно быть целочисленным',
        ];
    }
}
