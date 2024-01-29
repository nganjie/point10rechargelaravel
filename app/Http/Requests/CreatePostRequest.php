<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            "nom"=>["required"],
            "numero"=>["required","regex:/^6[0-9]+$/","min:9","max:9"],
            "image"=>["image","max:2000"]
        ];
        //Rule::unique("utilisateur")->ignore($this->route()->paramater("utilisateur"))
    }
}
