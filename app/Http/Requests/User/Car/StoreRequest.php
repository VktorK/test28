<?php

namespace App\Http\Requests\User\Car;

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
        ];
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
}
