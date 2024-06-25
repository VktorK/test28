<?php

namespace App\Http\Requests\Admin\CarModel;

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
}
