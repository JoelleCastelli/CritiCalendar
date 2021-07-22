<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
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
        return [
            'current_password' => 'required',
            'email' => ['required',
                        Rule::unique('users')->ignore(Auth::user()->id),
                        'email:rfc,dns'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Un nom d\'utilisateur est requis',
            'email.required' => 'Un e-mail est requis',
            'email.email' => 'Le format de l\'e-mail est incorrect',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée',
        ];
    }
}
