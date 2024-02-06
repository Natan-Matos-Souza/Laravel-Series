<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesRequestForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'              => ['required', 'min:3'],
            'seasonsQuantity'   => ['required'],
            'episodesQuantity'  => ['required'],
            'image'             => ['image']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'             => "O campo 'Nome da Série' é obrigatório!",
            'name.min'                  => "O campo 'Nome da Série' deve conter, no mínimo, :min caracteres!",
            'seasonsQuantity.required'  => "O campo 'Temporadas' é obrigatório!",
            'episodes.required'         => "O campo 'Temporadas' é obrigatório!",
            'image.image'               => "Apenas arquivos jpg, jpeg, png, gif e webp são suportados!"
        ];
    }
}
