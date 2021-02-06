<?php

namespace App\Http\Requests\V1\User;

use App\Rules\StringShouldBeContainsIn;
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
            'name' => ['required', new StringShouldBeContainsIn($this->email)],
            'email' => 'required',
            'password' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'A title is required',
            'email.required' => 'A message is required',
            'email.email' => 'A message is required',
            'password.required' => 'A message is required',
        ];
    }
}
