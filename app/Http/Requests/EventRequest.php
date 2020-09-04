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
            'title' => 'required|string|max:255',
            'venues' => 'required|array',
            'description' => 'nullable|string',
            'price' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
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
            'title.required' => 'Le Titre est obligatoire',
            'title.max' => 'Le Titre est trop long (max 255 caractères)',
            'venues.required' => 'Au moins un Espace est obligatoire',
            'price.required' => 'L\'Entrée est obligatoire',
            'start.required' => 'Le Début est obligatoire',
            'end.required' => 'La Fin est obligatoire',
            'end.after' => 'La Fin doit être ultérieure au Début',
        ];
    }
}
