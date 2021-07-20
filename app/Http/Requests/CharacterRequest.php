<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterRequest extends FormRequest
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
            'character_id' => 'required|integer',
            'ancestry' => 'string',
            'class' => 'string',
            'alignment' => 'string',
            'level' => 'integer',
            'XP' => 'integer',
            'HP' => 'integer',
            'strength' => 'integer',
            'initiative' => 'integer',
            'speed' => 'integer',
            'dexterity' => 'integer',
            'constitution' => 'integer',
            'intelligence' => 'integer',
            'wisdom' => 'integer',
            'charisma' => 'integer',
            'attacks' => 'string',
            'languages' => 'string',
            'equipment' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'character_id.required' => 'L\'ID de personnage est requis',
            'character_id.integer' => 'L\'ID de personnage doit être un nombre entier',
            'ancestry.string' => 'Le champ "Ancêtre" doit être une chaîne de caractères',
            'class.string' => 'Le champ "Classe" doit être une chaîne de caractères',
            'alignment.string' => 'Le champ "Alignement" doit être une chaîne de caractères',
            'level.integer' => 'Le champ "Niveau" doit être un nombre entier',
            'XP.integer' => 'Le champ "XP" doit être un nombre entier',
            'HP.integer' => 'Le champ "HP" doit être un nombre entier',
            'strength.integer' => 'Le champ "Force" doit être un nombre entier',
            'initiative.integer' => 'Le champ "Initiative" doit être un nombre entier',
            'speed.integer' => 'Le champ "Vitesse" doit être un nombre entier',
            'dexterity.integer' => 'Le champ "Dextérité" doit être un nombre entier',
            'constitution.integer' => 'Le champ "Constitution" doit être un nombre entier',
            'intelligence.integer' => 'Le champ "Intelligence" doit être un nombre entier',
            'wisdom.integer' => 'Le champ "Sagesse" doit être un nombre entier',
            'charisma.integer' => 'Le champ "Charisme" doit être un nombre entier',
            'attacks.string' => 'Le champ "Attaques" doit être une chaîne de caractères',
            'languages.string' => 'Le champ "Langues" doit être une chaîne de caractères',
            'equipment.string' => 'Le champ "Equipement" doit être une chaîne de caractères',
        ];
    }
}
