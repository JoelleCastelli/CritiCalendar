<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'theme_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Un nom de campagne est requis',
            'description.required' => 'Une description est requise',
            'theme_id.required' => 'Un thème est requis',
            'name.string' => 'Le nom de campagne doit être une chaîne de caractères',
            'description.string' => 'La description doit être une chaîne de caractères',
            'theme_id.integer' => 'Le thème doit être un nombre entier',
        ];
    }
}
