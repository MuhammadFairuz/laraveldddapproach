<?php

namespace App\Http\Requests\V1\User;

use Illuminate\Http\Exceptions\HttpResponseException;
use App\Rules\StringShouldBeContainsIn;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:10'],
            'email' => ['required',  new StringShouldBeContainsIn($this->name)]
        ];
    }

    /**
     * failed validation
     *
     * @param Validator $validator
     * @return void
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(respApiValidationError($validator->errors()));
    }
}
