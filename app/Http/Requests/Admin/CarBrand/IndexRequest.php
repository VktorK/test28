<?php

namespace App\Http\Requests\Admin\CarBrand;

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
            'title' => 'nullable|string',
            'create_from'=> 'nullable|date_format:Y-m-d H:i:s',
            'create_to'=> 'nullable|date_format:Y-m-d H:i:s'
        ];
    }
}
