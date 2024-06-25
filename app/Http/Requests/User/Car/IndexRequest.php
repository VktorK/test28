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
            'user_id' => 'nullable|integer',
            'created_from' => 'nullable|date_format:Y-m-d H:i:s',
            'created_to' => 'nullable|date_format:Y-m-d H:i:s',
        ];
    }
}
