<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreation extends FormRequest
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
            'user_id' => ['required', 'numeric'],
            'nom' => ['required', 'string', 'max:255'],
            'prix' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'categorie' => ['required', 'string'],
            'sous_categorie' => ['required', 'string'],
            // 'images' => ['required', 'array'],
            // 'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096'],*
            // TODO UNCOMMENT THIS AND SEE HOW TO DO TO FIX EM
        ];
    }
}
