<?php

namespace App\Http\Requests\User\Car;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ShowRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'is_car_owner' => 'required|boolean|in:1',
        ];
    }

    protected function prepareForValidation()
    {

        return $this->merge([
            'is_car_owner' => $this->route('car')->user_id == auth()->id() ? 1 : 0,
        ]);
    }

    public function messages(): array
    {
        return [
            'is_car_owner.in' => 'Вы неявляетесь собственником автомобиля, просмотр данных авто запрещен'
        ];
    }
}
