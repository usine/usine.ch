<?php

namespace App\Http\Requests;

use App\Venue;
use Illuminate\Foundation\Http\FormRequest;

class VenueRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'access' => 'nullable|string|max:255',
            'tel' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image',
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
            'name.required' => 'Le nom est obligatoire',
            'name.max' => 'Le nom est trop long (max 255 caractères)',
            'access.max' => 'Le champ accès est trop long (max 255 caractères)',
            'tel.max' => 'Le numéro de téléphone est trop long (max 255 caractères)',
            'email.email' => 'L\'email doit être valide',
            'email.max' => 'L\'email est trop long (max 255 caractères)',
            'website.url' => 'Le site doit être une URL valide',
            'website.max' => 'Le site est trop long (max 255 caractères)',
            'logo.image' => 'Le logo doit être une image (jpeg, png, bmp, gif, svg, or webp)',
        ];
    }
}
