<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageContactRequest extends FormRequest
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
            "nom"=>"required|min:4",
            "numero"=>["required","regex:/^6[0-9]+$/","min:9","max:9"],
            "email"=>"required|email",
            "content"=>"required|min:10"
        ];
    }
}
