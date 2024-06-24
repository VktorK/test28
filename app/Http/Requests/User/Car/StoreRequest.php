<?php

namespace App\Http\Requests\User\Car;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
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
}
