<?php

namespace App\Http\Requests\User\User;

use App\Models\User;
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
            'name'=> 'nullable|string',
            'email'=> 'required|string|unique:users,email,' . auth()->id(),
        ];
    }
}
