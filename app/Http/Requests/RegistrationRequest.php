<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'role' => 'required|string|in:consumer,artisan,delivery_man',
            'type_service' => 'required_if:role,artisan|string',
            'desc_entreprise' => 'required_if:role,artisan|string',
            'heure_ouverture' => 'required_if:role,artisan|date_format:H:i',
            'heure_fermeture' => 'required_if:role,artisan|date_format:H:i',
            'num_telephone' => 'required|numeric',
            'est_disponible' => 'required_if:role,delivery_man|boolean',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'num_telephone' => 'required|string|max:10',
            'password' => 'required|string|min:3|confirmed',
            'password_confirmation' => 'required|string|min:3',
        ];
    }
}
