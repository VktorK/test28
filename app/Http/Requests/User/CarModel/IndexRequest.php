<?php

namespace App\Http\Requests\User\CarModel;

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
            'title'=>'nullable|string',
            'car_brand_id'=>'nullable|integer',
            'created_from'=>'nullable|date_format:Y-m-d H:i:s',
            'created_to'=>'nullable|date_format:Y-m-d H:i:s'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'title.string'=> 'Поле "title" должно быть типа "Строка"',
            'car_brand_id.integer'=> 'Поле "Идентификатор бренда автомобиля" должно быть целочисленным',
            'create_from.date' => 'Поле "created_from" должно быть типа data',
            'create_to.date' => 'Поле "created_to" должно быть типа data',
        ];
    }
}
