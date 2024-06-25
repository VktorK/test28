<?php

namespace App\Http\Requests\Admin\Car;

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
            'year_of_issue' => 'nullable|integer',
            'mileage' => 'nullable|integer',
            'color' => 'nullable|string',
            'car_brand_id' => 'nullable|integer|exists:car_brands,id',
            'car_model_id' => 'nullable|integer|exists:car_models,id',
            'user_id' => 'nullable|integer|exists:users,id',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'year_of_issue.integer' => 'Поле "год выпуска" должно быть целочисленным',
            'mileage.integer' => 'Поле "пробег" должно быть целочисленным',
            'color.string' => 'Поле "цвет" должно быть типа "Строка"',
            'car_brand_id.integer' => 'Поле "идентификатор брэнда автомобиля" должно быть целочисленным',
            'car_model_id.integer' => 'Поле "идентификатор модели автомобиля" должно быть целочисленным',
            'user_id.integer' => 'Поле "идентификатор пользователя" должно быть целочисленным',
        ];
    }
}


