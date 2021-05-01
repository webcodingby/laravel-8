<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'min:3|max:255|required',
            'email' => [
                'min:3',
                'max:255',
                'email',
                'required',

            ],
        ];

        if (!empty($this->user)) {
            $rules['email'][] = Rule::unique('users')->ignore($this->user->id);
        } else {
            $rules['email'][] = Rule::unique('users');
        }

        return $rules;
    }
}
