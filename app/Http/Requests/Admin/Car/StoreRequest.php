<?php

namespace App\Http\Requests\Admin\Car;

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
            'year_of_issue' => 'required|integer',
            'mileage' => 'required|integer',
            'color' => 'required|string',
            'car_brand_id' => 'required|integer|exists:car_brands,id',
            'car_model_id' => 'required|integer|exists:car_models,id',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }


    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'year_of_issue.required' => 'Поле "год выпуска" обязательно к заполению',
            'mileage.required' => 'Поле "пробег" обязательно к заполению',
            'color.required' => 'Поле "цвет" обязательно к заполению',
            'car_brand_id.required' => 'Поле "идентификатор брэнда автомобиля" обязательно к заполению',
            'car_model_id.required' => 'Поле "идентификатор модели автомобиля" обязательно к заполению',
            'user_id.required' => 'Поле "идентификатор пользователя" обязательно к заполению',
            'year_of_issue.integer' => 'Поле "год выпуска" должно быть целочисленным',
            'mileage.integer' => 'Поле "пробег" должно быть целочисленным',
            'color.string' => 'Поле "цвет" должно быть типа "Строка"',
            'car_brand_id.integer' => 'Поле "идентификатор брэнда автомобиля" должно быть целочисленным',
            'car_model_id.integer' => 'Поле "идентификатор модели автомобиля" должно быть целочисленным',
            'user_id.integer' => 'Поле "идентификатор пользователя" должно быть целочисленным',
        ];
    }
}
