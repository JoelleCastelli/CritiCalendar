<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required|string',
            'start' => 'required|date',
            'end' => 'nullable|date',
            'place' => 'nullable|string',
            'URL' => 'nullable|string',
            'recap' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Un titre de la session est requis',
            'start.required' => 'Une date du début de la session est requise',

            'start.date' => 'La date du début doit être une date',
            'end.date' => 'La date de fin doit être une date',

            'place.string' => 'Le lieu de la session doit être une chaîne de caractères',
            'URL.string' => 'L\'URL doit être une chaîne de caractères',
            'recap.string' => 'Le récapitulatif doit être une chaîne de caractères',
        ];
    }
}
