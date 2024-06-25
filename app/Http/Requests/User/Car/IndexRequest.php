<?php

namespace App\Http\Requests\User\Car;

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
            'year_of_issue_from' => 'nullable|integer',
            'year_of_issue_to' => 'nullable|integer',
            'mileage_from' => 'nullable|integer',
            'mileage_to' => 'nullable|integer',
            'color' => 'nullable|string',
            'car_brand_id' => 'nullable|integer',
            'car_model_id' => 'nullable|integer',
            'created_from' => 'nullable|date_format:Y-m-d H:i:s',
            'created_to' => 'nullable|date_format:Y-m-d H:i:s',
        ];
    }

    protected function passedValidation()
    {
        return $this->merge([
            'year_of_issue_from' => $this->year_of_issue_from,
            'year_of_issue_to' => $this->year_of_issue_to,
            'mileage_from' => $this->mileage_from,
            'mileage_to' => $this->mileage_to,
            'color' => $this->color,
            'car_brand_id' => $this->car_brand_id,
            'car_model_id' => $this->car_model_id,
            'user_id' => $this->user_id = auth()->id(),
            'created_from' => $this->created_from,
            'created_to' => $this->created_to,
        ]);
    }

    public function messages(): array
    {
        return [
            'year_of_issue_from.integer' => 'Поле "год выпуска" должно быть целочисленным',
            'year_of_issue_to.integer' => 'Поле "год выпуска" должно быть целочисленным',
            'mileage_from.integer' => 'Поле "пробег" должно быть целочисленным',
            'mileage_to.integer' => 'Поле "пробег" должно быть целочисленным',
            'color.string' => 'Поле "цвет" должно быть типа "Строка"',
            'car_brand_id.integer' => 'Поле "идентификатор брэнда автомобиля" должно быть целочисленным',
            'car_model_id.integer' => 'Поле "идентификатор модели автомобиля" должно быть целочисленным',
            'user_id.integer' => 'Поле "идентификатор пользователя" должно быть целочисленным',
            'create_from.date' => 'Поле "created_from" должно быть типа data',
            'create_to.date' => 'Поле "created_to" должно быть типа data',
        ];

    }
}
