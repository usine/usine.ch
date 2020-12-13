<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class VoxRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'date' => Carbon::parse($this->date),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'thumbnail' => 'required|image',
            'vox' => 'required|file',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['thumbnail'] = 'nullable|image';
            $rules['vox'] = 'nullable|file';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Le titre est obligatoire',
            'title.max' => 'Le titre est trop long (max 255 caractères)',
            'date.required' => 'La date est obligatoire',
            'thumbnail.required' => 'La miniature est obligatoire',
            'thumbnail.image' => 'La miniature doit être une image (jpeg, png, bmp, gif, svg, or webp)',
            'vox.required' => 'Le Vox est obligatoire',
            'vox.file' => 'Le Vox doit être un document',
        ];
    }
}
