<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoutonRequest extends FormRequest
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
            'texte' => 'required|min:5|max:20'
        ];
    }
    public function messages()
    {
        return [
            'texte.required' => 'Le texte doit être entre 5 et 20 caractères.'
        ];
    }
}
