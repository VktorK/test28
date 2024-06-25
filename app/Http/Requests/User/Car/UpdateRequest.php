<?php

namespace App\Http\Requests\User\Car;

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
            'is_car_owner' => 'required|boolean|in:1|exclude',
            'year_of_issue' => 'nullable|integer',
            'mileage' => 'nullable|integer',
            'color' => 'nullable|string',
            'car_brand_id' => 'nullable|integer|exists:car_brands,id',
            'car_model_id' => 'nullable|integer|exists:car_models,id',
        ];
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'is_car_owner' => $this->route('car')->user_id == auth()->id() ? 1 : 0,
        ]);
    }

    protected function passedValidation()
    {
        return $this->merge([
            'year_of_issue' => $this->year_of_issue,
            'mileage' => $this->mileage,
            'color' => $this->color,
            'car_brand_id' => $this->car_brand_id,
            'car_model_id' => $this->car_model_id,
            'user_id' => $this->user_id = auth()->id(),
        ]);
    }

    public function messages(): array
    {
        return [
            'is_car_owner.in' => 'Вы неявляетесь собственником автомобиля, однавление данных запрещено'
        ];
    }


}
