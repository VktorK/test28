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
            'year_of_issue' => 'nullable|integer',
            'mileage' => 'nullable|integer',
            'color' => 'nullable|string',
            'car_brand_id' => 'nullable|integer|exists:car_brands,id',
            'car_model_id' => 'nullable|integer|exists:car_models,id',
            'user_id' => 'nullable|integer|exists:users,id',
        ];
    }
}
