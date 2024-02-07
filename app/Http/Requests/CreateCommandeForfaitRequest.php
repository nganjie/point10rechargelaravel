<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommandeForfaitRequest extends FormRequest
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
            "name"=>["required"],
            "nom_entreprise"=>["required"],
            "phone_number"=>["required","regex:/^6[0-9]+$/","min:9","max:9"],
            "pay_number"=>["required","regex:/^6[0-9]+$/","min:9","max:9"],
            "methode"=>["required"],
            "whatsap_number"=>["required","regex:/^6[0-9]+$/","min:9","max:9"],
            "transaction_number"=>["required"],
            "email"=>["required","email"],
            "id_forfait"=>["required"],
            "id_client"
        ];
    }
}
